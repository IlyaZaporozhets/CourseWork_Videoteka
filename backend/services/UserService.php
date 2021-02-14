<?php

class UserService
{
    /** @var UserDAO $userDAO */
    private $userDAO;

    /**
     * @return UserDAO
     */
    private function dao(): UserDAO
    {
        if (null === $this->userDAO) {
            $this->userDAO = action::dao('UserDAO');
        }

        return $this->userDAO;
    }

    /**
     * @param CustomObject $request
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function updateUserStatus(CustomObject $request)
    {
        return $this->dao()->updateStatus($request->param('id'), $request->param('status'));
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllUsers()
    {
        return $this->dao()->getAll();
    }

    /**
     * @param CustomObject $request
     * @return User
     * @throws Exception
     */
    public function findUserByEmail(CustomObject $request): User
    {
        return $this->dao()->findUserByKeyValue($request->param('email'), 'email');
    }

    /**
     * @param CustomObject $request
     * @return SuccessMessage
     */
    public function auth(CustomObject $request): SuccessMessage
    {
        $ex = null;
        $result = false;
        try {
            $existing = $this->findUserByEmail($request);
            if ((int)$existing->getStatus()->getValue() === User::STATUS_BLOCKED) {
                return Helper::error('You have been blocked due to violations of the rules of service');
            }
            if (!$existing->getID()) {
                return Helper::error('Юзера з таким e-mail не існує');
            }
            if($existing->getPassword()->getValue() !== $request->param('password')){
                return Helper::error('Неправильний логін або пароль ');
            }
            $userID = $existing->getID();
            $result = true;

            Helper::setSessionParam('user', $userID);
        } catch
        (Exception $e) {
            $ex = $e;
        }

        return $result
            ? Helper::success('Успішно авторизовано')
            : Helper::error('Щось пішло не так, але ми про це вже знаємо та скоро виправимо проблему')->setData(reportError('Сервіс авторизації скрутив дулю. Додаткова інформація:', [DESCRIPTION => $ex]));
    }

    /**
     * @param int $userID
     * @return User
     * @throws Exception
     */
    public function getUser(int $userID): User
    {
        return $this->dao()->findUserByKeyValue($userID);
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function createUser(CustomObject $request)
    {
        $rightNow = date("Y-m-d H:i:s");
        $request->setField('registeredDate', $rightNow);
        $request->setField('status', User::STATUS_ACTIVE);

        $res = $this->dao()->createUser($request);
        Helper::setSessionParam('user', (int)$res);
        return $res;
    }

    /**
     * @param array $request
     * @return array|bool
     * @throws Exception
     */
    public function searchByFields($request = [])
    {
        $params = [];
        foreach ($request as $key => $value) {
            if ($value && $value !== '') {
                switch ($key) {
                    case 'fullName':
                    case 'phoneNumber':
                        $params[] = like($key, $value);
                        break;
                    case 'status':
                        $params[] = equals($key, $value);
                        break;
                }
            }
        }
        if (count($params) === 0) {
            return true;
        }

        $requestToString = implode(' AND ', $params);
        return $this->dao()->getAllByCondition($requestToString);
    }
}