<?php
/** @var Page $page */
$context = $page->getContext();

/** @var LostItemDAO $lostDAO */
$lostDAO = action::dao('LostItemDAO');

$allLost = $lostDAO->getAllLostItems();
$result = [];
foreach ($allLost as $lost) {
    $user = User::getById($lost['user']);
    $lost['user'] = $user;
    $result[]=$lost;
}
?>
<body>
<? $page->loadInclude('landingNav') ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Втрачені речі</h1>
        <p>Перелік втрачених речей</p>

        <p><a class="btn btn-warning" href="/items" role="button">Додати запис</a></p>

    </div>
</div>

<div class="container">
<!--    <pre>-->
<!--        --><?// print_r($result) ?>
<!--    </pre>-->
    <!-- Example row of columns -->
    <div class="row">
        <? foreach ($result as $item):
            $body = (new CustomObject($item['body']))->toArray();

        ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>
                        <?= $body['name'] ?>
                        <small class="pull-right"> <span class="glyphicon glyphicon-time"></span> <?= $item['created'] ?></small>
                    </h4></div>
                <div class="panel-body row">
                    <div class="col-sm-5">
                        <img src="/assets/NoPicAvailable.png" class="img-responsive" style="opacity: 0.2">
                    </div>
                    <div class="col-sm-7">
                        <p><?= $item['description'] ?? '' ?></p>
                        <h4>Детальна інформація</h4>
                        <div class="row">
                            <? foreach ($body['fields'] as $field):?>
                                <div class="col-xs-12">
                                    <b><?= $field['name']?>:</b> <?= $field['value']?>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <h4>Контакти</h4>
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="glyphicon glyphicon-user"></span> <?= $item['user']['fullName'] ?>
                            </div>
                            <div class="col-xs-12">
                                <span class="glyphicon glyphicon-phone-alt"></span> <?= $item['user']['phoneNumber'] ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <? endforeach; ?>
    </div>

    <hr>

    <footer>
        <p>&copy; 2020 Codaline</p>
    </footer>
</div> <!-- /container -->
</body>