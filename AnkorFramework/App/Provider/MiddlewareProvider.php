<?php
namespace AnkorFramework\App\Provider;

use AnkorFramework\App\Exception\MiddlewareException;

class MiddlewareProvider
{
    private static ?self $instance = null;
    private $middleware;

    private function __construct()
    {
        $this->middleware = require pk_base_path('/AnkorFramework/config/MiddlewareConfig.php');
    }

    public static function getInstance()
    {
        return self::$instance ??= new self();
    }

    public function resolve($keys)
    {

        foreach ($keys as $key) {

            if (!isset($this->middleware[$key])) {
                throw new MiddlewareException("Middleware Not Found: $key");
            }

            $middlewareClass = $this->middleware[$key];

            if (!class_exists($middlewareClass)) {
                throw new MiddlewareException("Middleware Class Not Found: $middlewareClass");
            }

            $middleware = new $middlewareClass();

            if ($middleware->handle() !== null) {
                break;
            }

        }
    }

}