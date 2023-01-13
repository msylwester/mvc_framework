<?php

namespace App\Routes;

use App\Exceptions\ControllerDoesNotExistsException;
use App\Exceptions\ControllerMethodDoesNotExistsException;
use App\ServerError;

class Router
{
    private static array $routes = [];

    public static function get(string $route, string $class, string $method): void
    {
        self::$routes[$route] = [$class, $method];
    }

    public static function route(string $url): mixed
    {
        if (! isset(self::$routes[$url])) {
            return view('error_page')
                ->with('error', new ServerError(404, 'Page not found'))
                ->render();
        }

        $controller = self::$routes[$url][0];

        if (! class_exists($controller)) {
            throw new ControllerDoesNotExistsException();
        }

        $controller = new $controller();

        $method = self::$routes[$url][1];

        if (! method_exists($controller, $method)) {
            throw new ControllerMethodDoesNotExistsException();
        }

        return $controller->{$method}();
    }
}