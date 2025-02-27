<?php
namespace AnkorFramework\App\Exception;


class ResponeException
{
    public static function show($msg = "Execption")
    {
        $msg;
        require_once pk_base_path('/AnkorFramework/App/Exception/views/exception.view.php');
        exit;
    }

    public static function notFound()
    {
        require_once pk_base_path('/AnkorFramework/App/Exception/views/not-found.view.php');
        exit;
    }

}