<?php
namespace App;

class Router {
    static $get = [];
    static $post = [];
    
    static function get($url, $controller){
        array_push(self::$get, (object)["url" => $url, "controller" => $controller]);
    }

    static function post($url, $controller){
        array_push(self::$post, (object)["url" => $url, "controller" => $controller]);
    }

    static function redirect(){
        $url = isset($_GET['url']) ? "/" .$_GET['url'] : "/";
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        foreach(self::${$method} as $page){
            if($page->url === $url){
                $split = explode("@", $page->controller);  
                $conName = "Controller\\".$split[0];        
                $controller = new $conName();               
                $controller->{$split[1]}(); 
                exit;            
            }
        }
        echo "이 페이지는 존재하지 않는 패이지 입니다.";
    }
}