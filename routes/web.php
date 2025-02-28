<?php

use src\controllers\AuthController;
use src\controllers\DashboardController;
use src\controllers\HomeController;
use src\controllers\ProductController;
use AnkorFramework\App\Route\Route;


// write your routes here
Route::get('/', HomeController::class, 'index');
Route::get("/login", AuthController::class, 'login');
Route::post('/login-execute', AuthController::class, 'store');

Route::get('/admin', DashboardController::class, 'index');


//product route

    Route::get('/admin/products', ProductController::class, 'index');
    Route::get('/admin/products/create', ProductController::class, 'create');
    Route::get('/admin/products/update', ProductController::class,'update');
    // Route::get('/products/{id}', ProductController::class, action: 'show');

require_once "auth.php";