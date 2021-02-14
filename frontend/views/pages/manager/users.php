<body>
<?
/** @var $page Page */
$vars = $page->getContext();
$type = $vars->param('type');
$data = $vars->param('data');
?>
<div class="jumbotron">
    <div class="container">
        <h1>Users managements</h1>
        <p>Найкраще бюро відеокасет</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12"><a class="btn btn-default" href="/manager"> << BACK TO MANAGEMENT</a></div>
        <div class="col-md-12">
            <?if ($type === 'edit') {
                /** @var User $user */
                $user = User::getDataObjectByID((int)$data['edit']);
                ?>
                <h2>Edit user</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $user->getID() ?>">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" value="<?= $user->getFullName() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user->getEmail() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="registeredDate">Register Date</label>
                        <input type="text" class="form-control" id="registeredDate" name="registeredDate" placeholder="Date" value="<?= $user->getRegisteredDate() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" value="<?= $user->getPhoneNumber() ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" <?= (int)$user->getStatus()->getValue() === 1 ? 'selected' : '' ?>>Active</option>
                            <option value="2" <?= (int)$user->getStatus()->getValue() === 2 ? 'selected' : '' ?>>Blocked</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">EDIT USER</button>
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
                            Core.action('users/status', data, function (response) {
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
