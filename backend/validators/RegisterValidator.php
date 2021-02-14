<?php

class RegisterValidator extends Validator
{
    private static $emailRegEx = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";

    /**
     * @return CustomObject
     */
    public function validateFinish()
    {
        $r = $this->params();

        if (
            !$r->param('e') ||
            !filter_var($r->param('e'), FILTER_VALIDATE_INT) ||
            (int)$r->param('e') < 1 ||
            (int)$r->param('e') > MAX_INT_NUM
        ) {
            $this->fail('finish.badID');
        }

        if (
            !$r->param('h') ||
            !base64_decode($r->param('h'))
        ) {
            $this->fail('finish.badHash');
        }

        return $r;
    }

    /**
     * @return CustomObject
     * @throws Exception
     */
    public function validateNew()
    {
        $request = Helper::getRequestParams([REQUIRED => ['email', 'login', 'password', 'fullName',
            'phoneNumber']]);

        $request->setField('email', strtolower($request->getField('email')));

        if (!$request->getField('email')) {
            $this->fail('new.noEmail');
        }

        if (
            !filter_var($request->getField('email'), FILTER_VALIDATE_EMAIL) ||
            !preg_match(self::$emailRegEx, $request->getField('email'))
        ) {
            $this->fail('new.wrongEmailFormat');
        }

        /** @var UserService $service */
        $service = action::service('UserService');

        $existingUser = $service->findUserByEmail($request);

        if (null !== $existingUser && $existingUser->getEmail()->getValue() === $request->getField('email')) {
            $this->fail('new.existingUser');
        }

        return $request;
    }
}