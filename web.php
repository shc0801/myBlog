<?php

use App\Router;

Router::get("/", "MainController@indexPage");
Router::get("/party", "PartyController@partyPage");
Router::get("/store", "StoreController@storePage");
Router::get("/specialist", "SpecialistController@specialistPage");
Router::get("/estimate", "EstimateController@estimatePage");

Router::redirect();