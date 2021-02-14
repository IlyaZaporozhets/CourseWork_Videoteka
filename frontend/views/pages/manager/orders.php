<body>
<?
/** @var $page Page */
$vars = $page->getContext();
$type = $vars->param('type');
$data = $vars->param('data');

?>
<div class="jumbotron">
    <div class="container">
        <h1>Orders managements</h1>
        <p>Найкраще бюро відеокасет</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12"><a class="btn btn-default" href="/manager"> << BACK TO MANAGEMENT</a></div>
        <div class="col-md-12">
            <?if ($type === 'edit') {
                /** @var Order $order */
                $order = Order::getDataObjectByID((int)$data['edit']);

                /** @var User $user */
                $user = User::getDataObjectByID($order->getUser()->getValue());

                /** @var Item $item */
                $item = Item::getDataObjectByID($order->getItem()->getValue());
                ?>
                <h2>Edit order</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $order->getID() ?>">
                    <div class="form-group">
                        <label for="user">User</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="User" value="<?= $user->getFullName() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input type="email" class="form-control" id="item" name="item" placeholder="Item" value="<?= $item->getName() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?= $order->getDate() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="expireDate">Expire</label>
                        <input type="text" class="form-control" id="expireDate" name="expireDate" placeholder="Expire Date" value="<?= $order->getExpiration() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" <?= (int)$order->getStatus()->getValue() === 1 ? 'selected' : '' ?>>Pending</option>
                            <option value="2" <?= (int)$order->getStatus()->getValue() === 2 ? 'selected' : '' ?>>Accepted</option>
                            <option value="3" <?= (int)$order->getStatus()->getValue() === 3 ? 'selected' : '' ?>>Completed</option>
                            <option value="4" <?= (int)$order->getStatus()->getValue() === 4 ? 'selected' : '' ?>>Canceled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">EDIT ORDER</button>
                </form>
                <script>
                    $(document).ready(function () {
                        $('form').on('submit', function (e) {
                            wait();
                            e.preventDefault();
                            var fields = $('form').find("input, textarea, select").serializeArray(), data = {};
                            $(fields).each(function (i, field) {
                                data[field.name] = field.value;
                            });
                            Core.action('orders/status', data, function (response) {
                                waitReady();
                                console.info(response);
                                alert(response.message);
                            })
                        });
                    })
                </script>
            <? } ?>

        </div>

    </div>

    <footer>
        <p>&copy; 2021 Codaline</p>
    </footer>
</div> <!-- /container -->
</body>