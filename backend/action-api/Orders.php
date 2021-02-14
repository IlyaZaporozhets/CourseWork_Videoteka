<?php


class Orders
{
    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function GET_list()
    {
        /** @var OrderService $service */
        $service = action::service('OrderService');

        return (new SuccessMessage('Get all orders status'))->setData($service->getAllOrders());
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_status()
    {
        $request = Helper::getRequestParams([REQUIRED => ['id', 'status']]);

        /** @var OrderService $service */
        $service = action::service('OrderService');

        return new SuccessMessage('Update order status', $service->changeStatus($request->param('id'), $request->param('status')));
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_create()
    {
        $request = Helper::getRequestParams([REQUIRED => ['user', 'item']]);

        /** @var OrderService $service */
        $service = action::service('OrderService');

        return new SuccessMessage('Create order status', $service->createOrder($request));
    }

    /**
     * @return bool|SuccessMessage
     * @throws Exception
     */
    public function GET_statusProfile()
    {
        $request = Helper::getRequestParams([REQUIRED => ['id', 'status']]);

        /** @var OrderService $service */
        $service = action::service('OrderService');

        if($service->changeStatus($request->param('id'), $request->param('status'))){
            header("Location:/profile");
            exit(200);
        }
        return new SuccessMessage('Smth went wrong, contact administrator', false);
    }
}