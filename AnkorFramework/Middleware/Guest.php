<?php
namespace AnkorFramework\middleware;

use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Middleware\IMiddleware;

class Guest implements IMiddleware
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            Response::redirect('/');
        }
    }
}