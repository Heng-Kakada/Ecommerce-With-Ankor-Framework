<?php
namespace AnkorFramework\App\Provider;

class MiddlewareProvider
{
    private static $instance = null;
    private $middleware;

    private function __construct()
    {
        $this->middleware = require pk_base_path('/AnkorFramework/config/MiddlewareConfig.php');

    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MiddlewareProvider();
        }
        return self::$instance;
    }

    public function resolve($keys)
    {
        if (empty($keys)) {
            return;
        }
        foreach ($keys as $key) {
            if (!array_key_exists($key, $this->middleware)) {
                throw new \Exception("Middleware key '{$key}' not found");
            }

            (new $this->middleware[$key])->handle();
        }
    }

}