<body>
<?php
/** @var Page $page */
$page->loadInclude('landingNav');
?>
<div class="jumbotron">
    <div class="container">
        <h1>Реєстрація</h1>
        <p></p>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
            </div>
            <button type="submit" class="btn btn-success">Register</button>
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
                    Core.action('register/new', data, function (response) {
                        waitReady();
                        console.info(response);
                        alert(response.message);
                        location.href = "/";
                        // $create.find("input, textarea").val("");
                        // location.reload()
                    })
                });
            })
        </script>
    </div>
</div>
</body>