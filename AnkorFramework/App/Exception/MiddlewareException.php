<?php
namespace AnkorFramework\App\Exception;


use RuntimeException;

class MiddlewareException extends RuntimeException
{
    protected $statusCode;

    public function __construct($message = "Middleware Error", $statusCode = 403)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

}