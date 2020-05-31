<?php
use App\Router;

Router::get("/", "MainController@indexPage");
Router::get("/party", "PartyController@partyPage");
Router::get("/store", "StoreController@storePage");
Router::get("/specialist", "SpecialistController@specialistPage");
Router::get("/build", "BuildController@buildPage");

Router::post("/login", "UserController@loginProccess");
Router::post("/join", "UserController@joinProccess");
Router::get("/logout", "UserController@logoutProccess");

Router::post("/write", "PartyController@writeProccess");
Router::post("/rating", "PartyController@ratingProccess");
Router::post("/review", "SpecialistController@reviewProccess");
Router::post("/request", "BuildController@requestProccess");
Router::post("/build", "BuildController@buildProccess");

Router::redirect();