<?php
namespace AnkorFramework\middleware;

use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Middleware\IMiddleware;

class Admin implements IMiddleware
{
    public function handle()
    {
        if (($_SESSION['user']['role'] ?? null) === 'admin') {
            return true;
        }
        Response::previousUrl();
        return null;
    }
}