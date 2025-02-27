<?php

namespace AnkorFramework\App\Route;


use AnkorFramework\App\Utils\HttpMethod;
use AnkorFramework\App\Route\RouteHandler;



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
