<?php

namespace AnkorFramework\Core\Validate;

use Exception;
use Throwable;


class ValidationException extends Exception
{
    protected array $errors;

    public function __construct(array $errors, $message = "Validation errors occurred", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}