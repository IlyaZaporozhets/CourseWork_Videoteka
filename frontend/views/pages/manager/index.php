<body>
<?

/** @var Page $page */
$page->loadInclude('landingNav');

/** @var OrderDAO $ordersDAO */
$ordersDAO = action::dao('OrderDAO');

/** @var ItemDAO $itemsDAO */
$itemsDAO = action::dao('ItemDAO');

/** @var UserDAO $usersDAO */
$usersDAO = action::dao('UserDAO');

$users = $usersDAO->getAll();
$items = $itemsDAO->getAll();
$orders = $ordersDAO->getAll();

$usersByIDS = [];
foreach ($users as $user) {
    $user = User::typecast($user);
    $usersByIDS["u{$user->getID()}"] = $user;
}

$itemsByIDS = [];
foreach ($items as $item) {
    $item = Item::typecast($item);
    $itemsByIDS["i{$item->getID()}"] = $item;
}
?>
<div class="jumbotron">
    <div class="container">
        <h1>Бюро відеокасет</h1>
        <p>Найкраще бюро відеокасет</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
                <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
                <li role="presentation"><a href="#items" aria-controls="items" role="tab" data-toggle="tab">Items</a></li>
            </ul>
        </div>


        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="orders">
                <div class="col-md-12">
                    <h3>Orders
                        <form class="form-inline pull-right" method="get" action="/manager/search">
                            <div class="form-group">
                                <input class="form-control" type="text" required name="order" placeholder="Search orders by ID">
                            </div>
                            <button type="submit" class="btn btn-default">Search orders</button>
                        </form>
                    </h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Item</th>
                            <th>Date</th>
                            <th>Expiration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <? foreach ($orders as $order):
                            /** @var Order $order */
                            $order = Order::typecast($order);
                            /** @var User $user */
                            $user = $usersByIDS["u{$order->getUser()}"];
                            /** @var Item $item */
                            $item = $itemsByIDS["i{$order->getItem()}"];
                            ?>
                            <tr>
                                <td><?= $order->getID() ?></td>
                                <td><a class="badge" href="#/manager/users/edit/<?=$user->getID()?>">user#<?=$user->getID()?></a> <b><?= $user->getFullName() ?></b></td>
                                <td><a class="badge" href="/manager/items/edit/<?=$item->getID()?>">item#<?=$item->getID()?></a> <b><?= $item->getName() ?></b></td>
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
                                    <a href="/manager/orders/edit/<?= $order->getID() ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="users">
                <div class="col-md-12">
                    <h3>Clients
                        <form class="form-inline pull-right" method="get" action="/manager/search">
                            <div class="form-group">
                                <input class="form-control" type="text" required name="user" placeholder="Search users by phone">
                            </div>
                            <button type="submit" class="btn btn-default">Search users</button>
                        </form>
                    </h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Register Date</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <? foreach ($users as $usr):
                            /** @var User $usr */
                            $usr = User::typecast($usr);
                            ?>
                            <tr>
                                <td><?= $usr->getID() ?></td>
                                <td><b><?= $usr->getFullName() ?></b></td>
                                <td><?= $usr->getEmail() ?></td>
                                <td><?= $usr->getRegisteredDate() ?></td>
                                <td><?= $usr->getPhoneNumber() ?></td>
                                <td><? $status = '';
                                    switch ($usr->getStatus()->getValue()) {
                                        case User::STATUS_ACTIVE: $status = 'Active'; break;
                                        case User::STATUS_BLOCKED: $status = 'Blocked'; break;
                                    } ?>
                                    <?= $status ?>
                                </td>
                                <td>
                                    <a href="/manager/users/edit/<?= $usr->getID() ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="items">
                <div class="col-md-12">
                    <h3>Cassettes
                        <form class="form-inline pull-right" method="get" action="/manager/search">
                            <div class="form-group">
                                <input class="form-control" type="text" required name="item" placeholder="Search items by name">
                            </div>
                            <button type="submit" class="btn btn-default">Search items</button>
                            <a class="btn btn-primary" href="/manager/items/add/new" role="button">ADD NEW ITEM</a>
                        </form>
                    </h3>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        <? foreach ($items as $itm):
                            /** @var Item $itm */
                            $itm = Item::typecast($itm);
                            ?>
                            <tr>
                                <td><?= $itm->getID() ?></td>
                                <td><b><?= $itm->getName() ?></b></td>
                                <td><?= $itm->getCost() ?></td>
                                <td><?= $itm->getDescription() ?></td>
                                <td><?= $itm->getImage() ?></td>
                                <td><?= $itm->getDate() ?></td>
                                <td>
                                    <a href="/manager/items/edit/<?= $itm->getID() ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <p>&copy; 2021 Codaline</p>
    </footer>
</div> <!-- /container -->
</body>