<?php
function view($view_path, $data = []){
    extract($data); 

    $view_path = VIEW."/$view_path.php";

    include $view_path;
}

function message($message = ""){
    if($message) echo $message;
}

//test