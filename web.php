<?php 

use App\Router;

Router::get('/', 'MainController@index');
Router::post('/users', 'UserController@members');
Router::post('/login', 'UserController@login');
Router::post('/logout', 'UserController@logout');

Router::post('/playList', 'PlayListController@playList');
Router::Router();