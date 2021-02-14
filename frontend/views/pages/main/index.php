<body>
<?php
/** @var Page $page */


/** @var ItemDAO $itemsDAO */
$itemsDAO = action::dao('ItemDAO');
$items = $itemsDAO->getAll();
?>
<? $page->loadInclude('landingNav') ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Бюро відеокасет</h1>
        <p>Найкраще бюро відеокасет</p>
        <p>
        </p>
    </div>
</div>
<div class="container">
    <!--    <pre>-->
    <!--        --><?// print_r($result) ?>
    <!--    </pre>-->
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-12"><h2>Last arrivals</h2></div>
        <? foreach ($items as $item):
            /** @var Item $item */
            $item = Item::typecast($item);

            ?>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>
                            <?= $item->getName() ?>
                            <b class="pull-right"><small><span class="glyphicon glyphicon-usd"></span></small><?= $item->getCost() ?></b>
                        </h4></div>
                    <div class="panel-body row">
                        <div class="col-sm-5" style="min-height: 200px; height: 200px">
                            <img src="<?= filter_var($item->getImage()->getValue(),FILTER_VALIDATE_URL) ?: '/assets/NoPicAvailable.png'?>" class="img-responsive">
                        </div>
                        <div class="col-sm-7">
                            <small><span class="glyphicon glyphicon-time"></span> Added: <?= $item->getDate() ?></small>
                            <h4>Description</h4>
                            <p><?= $item->getDescription() ?? '' ?></p>
                            <p><button data-id="<?= $item->getID() ?>" class="btn btn-success pull-right order-btn"><span class="glyphicon glyphicon-film"></span> Order for $<?= $item->getCost() ?></button></p>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>

    <hr>
</div>


<div class="container">
    <footer>
        <p>&copy; 2021 Codaline</p>
    </footer>
</div>
</body>