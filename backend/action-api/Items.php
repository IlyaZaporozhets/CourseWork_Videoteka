<?php


class Items
{
    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_create()
    {
        $request = Helper::getRequestParams([REQUIRED => ['name', 'cost', 'description', 'type', 'amount', 'image']]);
        $request->setField('date', date('Y-m-d'));

        /** @var ItemService $service */
        $service = action::service('ItemService');

        return new SuccessMessage('Create item status', $service->createItem($request));
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function POST_update()
    {
        $request = Helper::getRequestParams([REQUIRED => ['name', 'cost', 'description', 'type', 'amount', 'image', 'date']]);

        /** @var ItemService $service */
        $service = action::service('ItemService');

        return new SuccessMessage('Update item status', $service->updateItem($request));
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function GET_list()
    {
        /** @var ItemService $service */
        $service = action::service('ItemService');

        return (new SuccessMessage('Get all items status'))->setData($service->getAllItems());
    }

    /**
     * @return SuccessMessage
     * @throws Exception
     */
    public function GET_item()
    {
        $request = Helper::getRequestParams([REQUIRED => ['id']]);

        /** @var ItemService $service */
        $service = action::service('ItemService');

        return (new SuccessMessage('Get item status'))->setData($service->getItem($request));
    }
}