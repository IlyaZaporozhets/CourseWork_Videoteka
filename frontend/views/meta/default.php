<?php
/** @var Page $page */
$m = $page->getMessages();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">
<meta name="theme-color" content="#34495e">
<?php if($m->get('keywords')): ?>
    <meta name="Keywords" content="<?= $m->get('keywords') ?>">
<? endif ?>
<?php if($m->get('description')): ?>
    <meta name="abstract" content="<?= $m->get('description') ?>"/>
    <meta name="description" content="<?= $m->get('description') ?>"/>
    <meta itemprop="description" content="<?= $m->get('description') ?>"/>
    <meta name="twitter:description" content="<?= $m->get('description') ?>"/>
    <meta property="og:description" content="<?= $m->get('description') ?>"/>
<? endif ?>
<meta name="twitter:title" content="<?= $m->get('title') ?>">
<meta property="og:title" content="<?= $m->get('title') ?>">
<title><?= $m->get('title') ?></title>
<meta itemprop="name" content="<?= $m->get('title') ?>">
<meta property="og:site_name" content="Videoteka" />
<?php if($m->get('image')): ?>
    <meta itemprop="image" content="<?= $m->get('image') ?>" />
    <meta property="og:image" content="<?= $m->get('image') ?>" />
    <meta name="twitter:image:src" content="<?= $m->get('image') ?>" />
<? endif ?>

<?= $page->loadNativeAsset('jquery-2.1.1', 'js') ?>
<?= $page->loadNativeAsset('bootstrap.min') ?>

<?= $page->loadNativeAsset('bootstrap.min', 'js') ?>
<?= $page->loadNativeAsset('bootstrap-dialog.min', 'js') ?>
<?= $page->loadNativeAsset('ejs_production', 'js') ?>
<?= $page->loadNativeAsset('action.lib', 'js') ?>
<?= $page->loadNativeAsset('action', 'js') ?>
</head>
<style>
    #waiting{
        position: fixed;
        right: 0;
        top: 0;z-index: 20001;
        background: #f3f3f4;
        width: 100%;
        opacity: 0.7;
        height: 100vh;
        padding: 0 20px;
        text-align: center;
        display: block;
    }
    #waiting table,#waiting td{
        width:100%;
        height: 100vh;
        border:0 solid transparent;
        text-align: center;
    }
</style>
<div id="waiting" style="display: block"><table><tr><td><img src="/assets/action/images/wait.gif"></td></tr></table></div>
<script>
    function wait() {
        $("#waiting").show()
    }
    function waitReady() {
        $("#waiting").hide()
    }
    $(document).ready(function () {
        $('a:not([target="_blank"]):not([role="tab"])').on("click", function () {
            wait();
            setTimeout(function () {
                location.reload()
            }, 10000);
        });
        waitReady();
    });
</script>