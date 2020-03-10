<?php 

use App\Router;

Router::get('/', 'MainController@index');
Router::post('/users', 'UserController@members');
Router::post('/login', 'UserController@login');
Router::Router();