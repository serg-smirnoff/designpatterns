<?php
ob_start();
require_once "listing12.05.php";
ob_end_clean();

sleep(1);
$reg5 = \woo\base\ApplicationRegistry::instance();
$reg5->setDSN(4444);
?>
