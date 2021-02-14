<?php

class UserDAO
{
    /**
     * @param string $value
     * @param string $key
     * @return User
     * @throws Exception
     */
    public function findUserByKeyValue(string $value, string $key = 'id'): User
    {
        return User::typecast(action::database()
            ->select(
                User::getClassName(),
                whereConditions(equals($key, $value)),
                ascending(),
                limits(FIRST_RECORD, ONE_RECORD)
            ));
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function createUser(CustomObject $request)
    {
        return User::typecast($request->toArray())->insert(RETURN_ID);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAll()
    {
        return action::database()->select(
            User::getClassName(),
            whereConditions( greater('id', 0) ),
            descending(),
            limits()
        );
    }

    /**
     * @param string $condition
     * @return array
     * @throws Exception
     */
    public function getAllByCondition(string $condition)
    {
        return action::database()->select(
            User::getClassName(),
            whereConditions($condition),
            descending(),
            limits()
        );
    }

    /**
     * @param int $id
     * @param int $status
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function updateStatus(int $id, int $status)
    {
        return action::database()->update(
            User::getClassName(),
            updateFields(['status' => $status]),
            whereConditions(equals('id', $id))
        );
    }
}