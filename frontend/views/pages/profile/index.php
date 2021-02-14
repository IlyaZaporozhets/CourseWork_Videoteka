<body>
<?php
/** @var Page $page */
$page->loadInclude('landingNav');

/** @var OrderDAO $orderDAO */
$orderDAO = action::dao('OrderDAO');
$orders = $orderDAO->findOrderByKeyValue($_SESSION['user'], 'user');

?>
<div class="jumbotron">
    <div class="container">
        <h1>Профіль</h1>
        <p></p>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <h3>Orders</h3>
        <table class="table table-striped table-hover">
            <tr>
                <th>Item</th>
                <th>Date</th>
                <th>Expiration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <? foreach ($orders as $order):
                /** @var Order $order */
                $order = Order::typecast($order);
                /** @var Item $item */
                $item = Item::getDataObjectByID($order->getItem()->getValue());
                ?>
                <tr>
                    <td><?= $item->getName() ?></td>
                    <td><?= $order->getDate() ?></td>
                    <td><?= $order->getExpiration()->getValue() ?: 'not set' ?></td>
                    <td><? $status = '';
                        switch ($order->getStatus()->getValue()) {
                            case Order::STATUS_PENDING: $status = 'Pending'; break;
                            case Order::STATUS_ACCEPTED: $status = 'Accepted'; break;
                            case Order::STATUS_COMPLETED: $status = 'Completed'; break;
                            case Order::STATUS_CANCELED: $status = 'Cancelled'; break;
                        } ?>
                        <?= $status ?>
                    </td>
                    <td>
                        <a href="action/orders/method/statusProfile/id/<?= $order->getID() ?>/status/<?= Order::STATUS_CANCELED ?>" class="btn btn-warning btn-sm"><i class="glyphicon"></i> Cancel</a>
                    </td>
                </tr>
            <? endforeach; ?>
        </table>
    </div>
</div>
</body>