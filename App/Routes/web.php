<?php

use \App\Routes\Router;
use App\Controllers\HomeController;

Router::get('/', HomeController::class, 'index');
Router::get('/test', HomeController::class, 'test');