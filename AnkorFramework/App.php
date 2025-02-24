<?php

namespace AnkorFramework;

use AnkorFramework\Core\Route\Route;

require_once "bootstrap/app.php";


/**
 * Class App
 *
 * This class is part of the AnkorFramework and is responsible for handling the core application logic.
 *
 * @package AnkorFramework
 */
class App
{
    public static $instance = null;
    public static function getInstance(): App
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct()
    {
    }
    public function Handle()
    {
        require_once __DIR__ . "/../routes/web.php";
        Route::handle();
    }
}