<?php
namespace AnkorFramework\middleware;

use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Middleware\IMiddleware;

class Manager implements IMiddleware
{
    public function handle()
    {
        return ($_SESSION['user']['role'] ?? null) === 'manager' ? true : null;
    }
}