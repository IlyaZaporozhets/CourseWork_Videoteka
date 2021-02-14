<?php


class OrderService
{
    /** @var OrderDAO $orderDAO */
    private $orderDAO;

    /**
     * @return OrderDAO
     */
    private function dao(): OrderDAO
    {
        if (null === $this->orderDAO) {
            $this->orderDAO = action::dao('OrderDAO');
        }

        return $this->orderDAO;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllOrders()
    {
        return $this->dao()->getAll();
    }

    /**
     * @param $id
     * @param $status
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function changeStatus($id, $status)
    {
        if((int)$status === Order::STATUS_ACCEPTED){
            /** @var Order $order */
            $order = Order::getDataObjectByID((int)$id);
            $date = new DateTime();
            date_add($date, date_interval_create_from_date_string('7 days'));
            $order->getExpiration()->setValue(date_format($date, 'Y-m-d'));

            $order->update(['expiration']);
        }

        return $this->dao()->updateStatus($id, $status);
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function createOrder(CustomObject $request)
    {
        $request->setField('status', Order::STATUS_PENDING);
        $request->setField('date', date('Y-m-d'));
        $request->setField('expiration', Order::EXPIRATION_NOT_SET);

        return $this->dao()->create($request);
    }
}