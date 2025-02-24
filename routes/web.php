<?php

use src\Controllers\ContactController;
use src\controllers\HomeController;
use AnkorFramework\Core\Route\Route;
use src\controllers\ProductController;

// write your routes here
Route::get('/', HomeController::class, 'index');
Route::get('/contact', ContactController::class, 'index');

// product routes
Route::get('/products', ProductController::class, 'index');
Route::get('/products/{id}', ProductController::class, 'show');

require_once "auth.php";