<?php

function view($view_path, $data = []){
    extract($data);

    if($view_path == "store")
        include VIEW."/storeHeader.php";
    else 
        include VIEW."/header.php";

    $view_path = VIEW."/$view_path.php";

    include $view_path;
    include VIEW."/footer.php";
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

function isEmpty($message = ""){
    foreach($_POST as $item){
        if($item === "") {
            $message !== "" ? back("모든 정보를 기입해 주십시오.") : back("모든 정보를 기입해 주십시오.");
            exit;
        }
    }
}