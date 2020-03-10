<?php

namespace App;

class Router {
    public static $actions = [];

    public static function router() {
        var_dump($_SERVER['REQUEST_URL']);
        $path = \explode("?", $_SERVER['REQUEST_URL'])[0];
    }
}