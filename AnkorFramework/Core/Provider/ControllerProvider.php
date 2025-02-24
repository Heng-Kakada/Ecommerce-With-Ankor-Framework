<?php
namespace AnkorFramework\Core\Provider;

use AnkorFramework\ApplicationFactory;
use AnkorFramework\Core\Container\AppCotainer;
use AnkorFramework\Utils\ScanDirectory\ScanController;

class ControllerProvider
{
    private static $instance = null;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ControllerProvider();
        }
        return self::$instance;
    }

    public function getController($controller)
    {
        $app = ApplicationFactory::create(ScanController::class);
        $container = ApplicationFactory::create(AppCotainer::class);

        $app->handler($controller);

        $data = $app->getData();

        $controller = pk_convert_path_for_namespace($data[$controller]);

        return $container->get($controller);
    }
}