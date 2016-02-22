<?php

\Framework\Application\Route::get("Survey/Overview", "SurveyController", "index")->defaultRoute();
\Framework\Application\Route::get("Survey/{value}", "SurveyController", "show");
\Framework\Application\Route::get("Survey/Vote/{value}", "SurveyController", "vote");
\Framework\Application\Route::get("Survey/Result/{value}", "SurveyController", "result");
