<?php
session_start();

function user(){
    return new App\User();
}

function session(){
    return new App\Session();
}

define("ROOT", dirname(__DIR__));
define("VIEW", ROOT."/src/views");

include_once ROOT . "/autoLoad.php";
include_once ROOT . "/helper.php";
include_once ROOT . "/web.php";