<?php

class Register
{
    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_new()
    {
        /** @var RegisterValidator $validator */
        $validator = action::validator('RegisterValidator');
        $request = $validator->validateNew();

        /** @var UserService $service */
        $service = action::service('UserService');

        return new SuccessMessage('Create user status', $service->createUser($request));
    }

    /**
     * @return SuccessMessage
     */
    public function POST_login()
    {
        $r = Helper::getRequestParams([REQUIRED => ['email', 'password']]);

        /** @var UserService $service */
        $service = action::service('UserService');
        $res = $service->auth($r);

        return new SuccessMessage('Auth status '.$res);
    }
}