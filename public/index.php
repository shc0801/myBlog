<?php
session_start();
define("ROOT", dirname(__DIR__));
define("VIEW", ROOT."/src/views");

include_once ROOT . "/autoLoad.php";
include_once ROOT . "/helper.php";
include_once ROOT . "/web.php";