<body>
<?
/** @var $page Page */
$vars = $page->getContext();
$type = $vars->param('type');
$data = $vars->param('data');
?>
<?
/** @var OrderDAO $ordersDAO */
$ordersDAO = action::dao('OrderDAO');

/** @var ItemDAO $itemsDAO */
$itemsDAO = action::dao('ItemDAO');

/** @var UserDAO $usersDAO */
$usersDAO = action::dao('UserDAO');

$usersAll = $usersDAO->getAll();
$itemsAll = $itemsDAO->getAll();

$usersByIDS = [];
foreach ($usersAll as $user) {
    $user = User::typecast($user);
    $usersByIDS["u{$user->getID()}"] = $user;
}

$itemsByIDS = [];
foreach ($itemsAll as $item) {
    $item = Item::typecast($item);
    $itemsByIDS["i{$item->getID()}"] = $item;
}
?>
<div class="jumbotron">
    <div class="container">
        <h1>Search</h1>
        <p>Найкраще бюро відеокасет</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12"><a class="btn btn-default" href="/manager"> << BACK TO MANAGEMENT</a></div>


        <? if ($type === 'orderByUserID'): ?>
        <?
            $order = $ordersDAO->findOrderByKeyValue($data['order']);
        ?>
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
                        </tr>
                        <?
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
                                <td><?= $order->getExpiration()->getValue() ?: '--' ?></td>
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
                    </table>
                </div>

        <? endif; ?>


        <? if ($type === 'userByPhone'): ?>
        <?
        $user = $usersDAO->findUserByKeyValue($data['user'], 'phoneNumber');
        ?>
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
                        </tr>
                            <tr>
                                <td><?= $user->getID() ?></td>
                                <td><b><?= $user->getFullName() ?></b></td>
                                <td><?= $user->getEmail() ?></td>
                                <td><?= $user->getRegisteredDate() ?></td>
                                <td><?= $user->getPhoneNumber() ?></td>
                                <td><? $status = '';
                                    switch ($user->getStatus()->getValue()) {
                                        case User::STATUS_ACTIVE: $status = 'Active'; break;
                                        case User::STATUS_BLOCKED: $status = 'Blocked'; break;
                                    } ?>
                                    <?= $status ?>
                                </td>
                                <td>
                                    <a href="/manager/users/edit/<?= $user->getID() ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                    </table>
                </div>
        <? endif; ?>

        <? if ($type === 'itemsByName'): ?>
        <?
            $item = $itemsDAO->findItemByKeyValue($data['item'], 'name');
        ?>
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
                            <tr>
                                <td><?= $item->getID() ?></td>
                                <td><b><?= $item->getName() ?></b></td>
                                <td><?= $item->getCost() ?></td>
                                <td><?= $item->getDescription() ?></td>
                                <td><?= $item->getImage() ?></td>
                                <td><?= $item->getDate() ?></td>
                                <td>
                                    <a href="/manager/items/edit/<?= $item->getID() ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                </td>
                            </tr>
                    </table>
                </div>
        <? endif; ?>
    </div>

    <footer>
        <p>&copy; 2021 Codaline</p>
    </footer>
</div> <!-- /container -->
</body>