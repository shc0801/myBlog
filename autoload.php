<?php

function classLoader($className){
    $classPath = ROOT."./src/$className.php";
    if(is_file($classPath))
        include $classPath;
}

spl_autoload_register("classLoader");