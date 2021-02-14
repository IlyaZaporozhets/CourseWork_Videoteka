<?php

class ItemDAO
{
    /**
     * @param string $value
     * @param string $key
     * @return Item
     * @throws Exception
     */
    public function findItemByKeyValue(string $value, string $key = 'id'): Item
    {
        return Item::typecast(action::database()
            ->select(
                Item::getClassName(),
                whereConditions(equals($key, $value)),
                ascending(),
                limits(FIRST_RECORD, ONE_RECORD)
            ));
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAll()
    {
        return action::database()->select(
            Item::getClassName(),
            whereConditions( greater('id', 0) ),
            descending('date'),
            limits()
        );
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function create(CustomObject $request)
    {
        return Item::typecast($request->toArray())->insert();
    }

    /**
     * @param CustomObject $request
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function update(CustomObject $request)
    {
        $item = Item::typecast($request->toArray());
        $item->setID(Helper::getRequestParams([REQUIRED => ['id']])->param('id'));

        return $item->update(['name', 'cost', 'description', 'type', 'amount', 'image', 'date']);
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getById(int $id)
    {
        return action::database()->select(
            Item::getClassName(),
            whereConditions(equals('id', $id))
        );
    }
}