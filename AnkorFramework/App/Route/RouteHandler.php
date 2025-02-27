<?php

namespace AnkorFramework\App\Route;

use AnkorFramework\App\Exception\ResponeException;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Exception\MiddlewareException;
use AnkorFramework\App\Http\Security\HttpSession;
use AnkorFramework\App\Provider\ControllerProvider;
use AnkorFramework\App\Provider\MiddlewareProvider;

class RouteHandler
{

    protected static $routes = [];
    protected static $middleware = [];

    public static function add($method, $path, $controller, $action, $middlewares = [])
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middlewares
        ];
        return new static;
    }

    public static function handle()
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];

        $currentUri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach (self::$routes as $route) {

            $pattern = self::generatePattern($route['path']);

            if ($route['method'] === $currentMethod && preg_match("#^$pattern$#", $currentUri, $matches)) {

                self::handleMiddleware($route['middleware']);

                $controller = basename(pk_replace_forward_slash($route['controller']));

                $controller = ControllerProvider::getInstance()->getController($controller);
                call_user_func_array([$controller, $route['action']], array_slice($matches, 1));

                exit();
            }

        }

        ResponeException::notFound();
    }

    public static function generatePattern($path)
    {
        return preg_replace_callback("#\{(\w+)\}#", function ($matches) {
            $paramName = $matches[1];

            $patterns = [
                'id' => '(\d+)',
                'slug' => '([a-z0-9-]+)',
                'uuid' => '([a-f0-9-]{36})',
                'any' => '([^\/]+)'
            ];

            return isset($patterns[$paramName]) ? $patterns[$paramName] : $patterns['any'];
        }, $path);
    }


    public static function middleware($middleware)
    {
        self::$middleware = is_array($middleware) ? $middleware : [$middleware];
        return new static;
    }


    public function group($callback)
    {
        call_user_func($callback);
        self::$middleware = [];
    }

    protected static function handleMiddleware($middleware)
    {
        try {
            MiddlewareProvider::getInstance()->resolve($middleware);
        } catch (MiddlewareException $e) {
            ResponeException::show($e);
        }
    }

}