<?php
namespace AnkorFramework\middleware;

use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Middleware\IMiddleware;

class Auth implements IMiddleware
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            Response::redirect('/');
        }
    }
}