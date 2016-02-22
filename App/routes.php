<?php

\Framework\Application\Route::get("Survey/Overview", "SurveyController", "index")->defaultRoute();
\Framework\Application\Route::get("Survey/{value}", "SurveyController", "show");
