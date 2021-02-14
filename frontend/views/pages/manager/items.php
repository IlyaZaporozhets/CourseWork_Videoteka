<body>
<?
/** @var $page Page */
$vars = $page->getContext();
$type = $vars->param('type');
$data = $vars->param('data');
?>
<div class="jumbotron">
    <div class="container">
        <h1>Items managements</h1>
        <p>Найкраще бюро відеокасет</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12"><a class="btn btn-default" href="/manager"> << BACK TO MANAGEMENT</a></div>
        <div class="col-md-12">
            <? if ($type === 'add'): ?>
                <h2>Add new item</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="3" class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="1">Cassette</option>
                            <option value="2">DVD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image URL" required>
                    </div>
                    <button type="submit" class="btn btn-success">ADD NEW ITEM</button>
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
                            Core.action('items/create', data, function (response) {
                                waitReady();
                                console.info(response);
                                alert(response.message);
                                // $create.find("input, textarea").val("");
                                // location.reload()
                            })
                        });
                    })
                </script>
            <? endif; ?>


            <? if ($type === 'edit') {
                /** @var Item $item */
               $item = Item::getDataObjectByID((int)$data['edit']);
            ?>
                <h2>Edit item</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $item->getID() ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $item->getName() ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost" value="<?= $item->getCost() ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="3" class="form-control" id="description" name="description" placeholder="Description" required><?= $item->getDescription() ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="1" <?= (int)$item->getType()->getValue() === 1 ? 'selected' : '' ?>>Cassette</option>
                            <option value="2" <?= (int)$item->getType()->getValue() === 2 ? 'selected' : '' ?>>DVD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?= $item->getAmount() ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image URL" value="<?= $item->getImage() ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?= $item->getDate() ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">EDIT ITEM</button>
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
                            Core.action('items/update', data, function (response) {
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