<?php
namespace AnkorFramework;


use AnkorFramework\App\Container\AppCotainer;
use Exception;
use AnkorFramework\App\Utils\ScanDirectory\ScanController;


class ApplicationFactory
{
    public static function create($type)
    {
        switch ($type) {
            case ScanController::class:
                return new ScanController();
            case AppCotainer::class:
                return new AppCotainer();
            default:
                throw new Exception("Search Factory not supported: $type ");
        }
    }
}