<?php 

use App\Router;

Router::get('/', 'MainController@index');
Router::post('/music', 'MainController@music');
Router::post('/musicData', 'MainController@musicData');

Router::post('/users', 'UserController@members');
Router::post('/login', 'UserController@login');
Router::post('/logout', 'UserController@logout');

Router::post('/innerPlayList', 'PlayListController@innerPlayList');
Router::post('/fetchPlayList', 'PlayListController@fetchPlayList');
Router::post('/deletePlayList', 'PlayListController@deletePlayList');

Router::post('/search', 'SearchController@searchData');
Router::Router();