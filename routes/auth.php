<?php

use AnkorFramework\App\Route\Route;
use src\controllers\AuthController;
use src\controllers\HomeController;
use src\controllers\ProductController;


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', AuthController::class, 'logout');

    // Route::get('/products', ProductController::class, 'index');
    // Route::get('/products/{id}', ProductController::class, action: 'show');
});

Route::middleware(['auth', 'manager', 'admin'])->group(function () {
    // Route::get('/dashboard/products/create', ProductController::class, 'create');
    // Route::post('/dashboard/products/store', ProductController::class, 'store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/contact', HomeController::class, 'contact');
});