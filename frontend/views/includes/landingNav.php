<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">VideoTeka</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if (!Helper::getSessionParam('user')): ?>
            <form class="navbar-form navbar-right" id="auth">
                <div class="form-group">
                    <input type="text" name="email" required placeholder="Your e-mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required placeholder="Your pass" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
                <a href="/registration" type="button" class="btn btn-default">Register</a>
            </form>
            <?php else:
                $user = User::getCurrentUser();
            ?>
                <form class="navbar-text navbar-right">
                    Доброго дня, <b><?= $user->getFullName()->getValue() ?></b>
                    <a href="/profile" class="btn btn-default">My orders</a>
                    <? if ($user->getID() === 1): ?>
                        <a href="/manager" class="btn btn-danger">MANAGER</a>
                    <? endif; ?>
                </form>

            <?php endif; ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<?php if (!Helper::getSessionParam('user')): ?>
    <script>
        var authWrapper = $("#auth");
        authWrapper.on('submit', function (e) {

            e.preventDefault();
            var fields = authWrapper.find("input").serializeArray(), data = {};
            $(fields).each(function(i, field){data[field.name] = field.value;});
            Core.action('register/login', data, function (response) {
                console.info(response);

                if (response.success) {
                    alert(response.message)
                    location.reload();
                } else {
                    alert(response.message)
                }
            })
        });

        $(document).ready(function () {
            $(".order-btn").on('click', function (e) {
                alert('Login to order a film');
            })
        })
    </script>
<?php endif; ?>
<?php if ((int)Helper::getSessionParam('user') > 0): ?>
<script>
    $(document).ready(function () {
        $(".order-btn").on('click', function (e) {
            wait();
            var user = <?= $user->getID() ?>,
                item = $(this).data('id')
            Core.action('orders/create', {user: user, item: item}, function (response) {
                waitReady();
                console.info(response);
                if (response.success) {
                    alert('Order created!')
                }else {
                    alert(response.message);
                }
                // $create.find("input, textarea").val("");
                // location.reload()
            })
        });
    })
</script>
<?php endif; ?>