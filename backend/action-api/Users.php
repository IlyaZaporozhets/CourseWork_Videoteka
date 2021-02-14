<?php


class Users
{
    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function GET_list()
    {
        /** @var UserService $service */
        $service = action::service('UserService');

        return (new SuccessMessage('Get all users status'))->setData($service->getAllUsers());
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_status()
    {
        $request = Helper::getRequestParams([REQUIRED => ['id', 'status']]);

        /** @var UserService $service */
        $service = action::service('UserService');

        return new SuccessMessage('Update user status', $service->updateUserStatus($request));
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function GET_search()
    {
        $request = Helper::getRequestParams([OPTIONAL => ['fullName', 'phoneNumber', 'status']]);

        /** @var UserService $service */
        $service = action::service('UserService');
        return (new SuccessMessage('Search users status'))->setData($service->searchByFields($request->toArray()));
    }
}