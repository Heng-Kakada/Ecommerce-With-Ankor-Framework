<?php
namespace AnkorFramework\middleware;

use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Middleware\IMiddleware;

class Auth implements IMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['user']) ?? false) {
            Response::redirect('/');
        }
    }
}