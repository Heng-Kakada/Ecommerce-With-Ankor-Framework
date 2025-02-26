<?php
namespace AnkorFramework\Middleware;

use AnkorFramework\Core\Http\Response;
use AnkorFramework\Core\middleware\IMiddleware;
class Auth implements IMiddleware
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            Response::redirect('/');
        }
    }
}