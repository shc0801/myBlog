<?php
namespace Controller;

use App\{DB, User, Lib};

class MainController {
    function indexPage(){
        view("index");
    }
}