<?php
/** @var Page $page */
$error = $page->getCustomMessages('errors');
?>
<body>
<h1><?= $error->get('head') ?></h1>
<p><?= $error->get('message') ?></>
</body>
<?php http_response_code(404); ?>