<?php 

use App\Router;

Router::get("/", "MainController@indexPage");
Router::post("/", "MainController@indexPage");

Router::post("/login", "UserController@loginProcess");
Router::post("/join", "UserController@registerProcess");
Router::post("/logout", "UserController@logoutProcess");

Router::Router();