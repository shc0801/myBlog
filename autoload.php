<?php 

function classLoader($className) {
    
    $classPath = ROOT . "/src/$className.php";

    $classPath = str_replace("\\", "/", "$classPath");
    if(is_file($classPath))
        include_once $classPath;
}

spl_autoload_register("classLoader");