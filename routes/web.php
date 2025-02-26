<?php

use src\controllers\AuthController;
use src\controllers\HomeController;
use AnkorFramework\Core\Route\Route;
use src\controllers\ProductController;

// write your routes here
Route::get('/', HomeController::class, 'index');

Route::get("/login", AuthController::class, 'login');
Route::post('/login-execute', AuthController::class, 'store');


// product routes
Route::get('/products', ProductController::class, 'index');
Route::get('/products/{id}', ProductController::class, action: 'show');

require_once "auth.php";