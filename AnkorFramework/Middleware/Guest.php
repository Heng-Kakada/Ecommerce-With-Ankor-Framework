<?php
namespace AnkorFramework\Middleware;

use AnkorFramework\Core\Http\Response;
use AnkorFramework\Core\middleware\IMiddleware;
class Guest implements IMiddleware
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            Response::redirect('/');
        }
    }
}