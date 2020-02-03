<?php

namespace App;

class Router{
    public static $actions = [];

    public static function router(){
        $path = explode("?", $_SERVER['REQUEST_URI'])[0];

        foreach(self::$actions as $actions){
            $url = preg_replace('/\//', '\/', $actions[0]);
            $url = preg_replace('/\{([^{}]+)\}/', '([^\/]+)', $url);

            if(preg_match("/^{$url}$/", $path, $result)){
                unset($result[0]);
                
                $urlAction = explode("@", $actions[1]); 
                $controllerClass = "Controller\\{$urlAction[0]}";
                $controller = new $controllerClass();
                $controller->{$urlAction[1]}(...$result);

                return;
            }
        }
        echo "404 NotFound";
    }

    public static function __callStatic($url, $controller){
        $req = \strtolower($_SERVER['REQUEST_METHOD']);

        if($req === $url){
            self::$actions[] = $controller;
        }   
    }
}