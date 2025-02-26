<?php

namespace AnkorFramework\Core\Route;


use AnkorFramework\Core\Route\RouteHandler;
use AnkorFramework\Utils\HttpMethod;


class Route extends RouteHandler
{
    public static function get($path, $controller, $action = null)
    {
        self::add(HttpMethod::GET, $path, $controller, $action, self::$middleware);
    }
    public static function post($path, $controller, $action = null)
    {
        self::add(HttpMethod::POST, $path, $controller, $action, self::$middleware);
    }
    public static function put($path, $controller, $action = null)
    {
        self::add(HttpMethod::PUT, $path, $controller, $action, self::$middleware);
    }
    public static function patch($path, $controller, $action = null)
    {
        self::add(HttpMethod::PATCH, $path, $controller, $action, self::$middleware);
    }
    public static function detele($path, $controller, $action = null)
    {
        self::add(HttpMethod::DELETE, $path, $controller, $action, self::$middleware);
    }

}
