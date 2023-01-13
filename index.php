<?php
declare(strict_types=1);

use App\Routes\Router;

include  $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR . 'functions.php';

spl_autoload_register(function ($name) {
    include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';
});

$url = isset($_SERVER['REQUEST_URI']) ? \explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
$url = array_filter($url);
$url = ! empty ($url) ? '/' . join($url) : '/';

include 'App/Routes/web.php';

Router::route($url);