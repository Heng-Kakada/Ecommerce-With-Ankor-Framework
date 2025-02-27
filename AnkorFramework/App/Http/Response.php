<?php

namespace AnkorFramework\App\Http;

use AnkorFramework\App\Http\Security\HttpSession;

/**
 * Response
 * 
 * Key For Access At View
 * 
 * 1 . success
 * 
 * $success
 * 
 * 2 . errors
 * 
 * $errors
 * 
 * 3 . data
 * [
 * $data => []
 * ]
 * 
 */
class Response
{
    protected static $data = [];

    public static function success(bool $success, $attribute = [])
    {
        if (!empty($attribute)) {
            self::$data['data'] = $attribute;
        }
        self::$data['success'] = $success;
        return new static;
    }

    public static function errors($errors = [], $statusCode = 0, $useSession = false)
    {
        if (!$useSession) {
            if (empty($errors)) {
                self::$data['errors'] = null;
                return new static;
            }
            self::$data['errors'] = [$errors, $statusCode];
            return new static;
        }

        HttpSession::flash('errors', [$errors, $statusCode]);
        return new static;
    }

    public static function data($attribute)
    {
        self::$data['data'] = $attribute;
        return new static;
    }

    public static function view($path, $attribute = [])
    {
        self::$data['data'] = $attribute;

        if (isset(self::$data['errors'])) {
            self::$data['data'] = [];
        }

        extract(self::$data);
        self::$data = [];
        require_once pk_base_path("src/views/" . $path . ".php");
    }

    public static function redirect($path)
    {
        header("Location: $path");
        exit();
    }

    public static function previousUrl()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            self::redirect($_SERVER['HTTP_REFERER']);
        } else {
            self::redirect('/');
        }
    }

}
