<?php


class OrderDAO
{
    /**
     * @param string $value
     * @param string $key
     * @return array
     * @throws Exception
     */
    public function findOrderByKeyValue(string $value, string $key = 'id')
    {
        return action::database()->select(
                Order::getClassName(),
                whereConditions(equals($key, $value)),
                descending('date'),
                limits()
            );
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAll()
    {
        return action::database()->select(
            'Order',
            whereConditions( greater('id', 0) ),
            descending('date'),
            limits()
        );
    }

    /**
     * @param $id
     * @param $status
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function updateStatus($id, $status)
    {
        return action::database()->update(
            Order::getClassName(),
            updateFields(['status' => $status]),
            whereConditions(equals('id', $id))
        );
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function create(CustomObject $request)
    {
        return Order::typecast($request->toArray())->insert();
    }
}