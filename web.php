<?php 

use App\Router;

Router::get("/", "MainController@indexPage");
Router::post("/", "MainController@indexPage");

Router::post("/login", "UserController@loginProcess");
Router::post("/join", "UserController@registerProcess");
Router::post("/logout", "UserController@logoutProcess");

Router::post("/board", 'BoardController@list');
Router::post("/writeLoad", 'BoardController@writeLoad');
Router::post("/write", "BoardController@writeProcess");
Router::post("/commentLoad", 'BoardController@commentLoad');
Router::post("/comment", 'BoardController@comment');

Router::post("/update", 'BoardController@update');
Router::post("/updateData", 'BoardController@updateData');
Router::post("/delete", 'BoardController@delete');

Router::Router();