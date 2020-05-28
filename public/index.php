<?php

session_start();

define("ROOT", dirname(__DIR__));  
define("VIEW", ROOT."/src/View");

include ROOT."/autoload.php";
include ROOT."/helper.php";
include ROOT."/web.php";