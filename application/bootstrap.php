<?php
require_once('core/_autoload.php');

$baseUrl = pathinfo($_SERVER['PHP_SELF'],PATHINFO_DIRNAME);
$baseUrl = str_replace('\\','',$baseUrl);
define('BASE_URL',$baseUrl);

