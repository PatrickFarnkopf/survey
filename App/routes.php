<?php

use Framework\Application\Route;

Route::get("Portal", "PortalController", "index")->defaultRoute();
Route::get("Survey/Overview", "SurveyController", "index")->authRequired();
Route::get("Survey/{value}", "SurveyController", "show")->authRequired();
Route::get("Survey/Vote/{value}", "SurveyController", "vote")->authRequired();
Route::get("Survey/Result/{value}", "SurveyController", "result")->authRequired();
Route::get("User/Login", "UserController", "login");
Route::get("User/Logout", "UserController", "logout")->authRequired();;
Route::post("User/Login", "UserController", "processLogin");
Route::get("Register", "UserController", "register");
Route::post("Register", "UserController", "processRegister");
