<?php

namespace App\Core;


class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];


    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }


    public function direct($url, $requestType)
    {
        if (array_key_exists($url, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$url])
            );
        }

        throw new Exception("no routes defined");
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond");
        }
        return $controller->$action();
    }
}
