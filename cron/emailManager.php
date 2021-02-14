<?php
include 'CRON.php';

$cron = new CRON();
$cron->service('EmailManagerCRON');
$cron->run('processEmailSending');