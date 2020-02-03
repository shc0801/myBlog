<?php 

use App\Router;

Router::get("/", "MainController@indexPage");
Router::post("/", "MainController@indexPage");

Router::Router();