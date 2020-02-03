<?php
function view($view_path, $data = []){
    extract($data); 

    $view_path = VIEW."/$view_path.php";

    include $view_path;
}

function back($message = ""){
    echo "<script>";
    if($message) echo "alert('$message');";
    echo "history.back()";
    echo "</script>";
    exit;
}

function go($url, $message = ""){
    echo "<script>";
    if($message) echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}