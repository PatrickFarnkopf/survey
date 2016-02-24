<?php

\Framework\Application\Route::get("Portal", "PortalController", "index")->defaultRoute();
\Framework\Application\Route::get("Survey/Overview", "SurveyController", "index")->authRequired();
\Framework\Application\Route::get("Survey/{value}", "SurveyController", "show")->authRequired();
\Framework\Application\Route::get("Survey/Vote/{value}", "SurveyController", "vote")->authRequired();
\Framework\Application\Route::get("Survey/Result/{value}", "SurveyController", "result")->authRequired();
\Framework\Application\Route::get("User/Login", "UserController", "login");
\Framework\Application\Route::get("User/Logout", "UserController", "logout")->authRequired();;
\Framework\Application\Route::post("User/Login", "UserController", "processLogin");
