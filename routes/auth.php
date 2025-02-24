<?php

use src\Controllers\AuthController;
use AnkorFramework\Core\Route\Route;
use src\controllers\ProductController;

Route::middleware("guset")->group(function () {
    Route::get("/login", AuthController::class, 'login');
});

Route::middleware("auth")->group(function () {
    // create product
    Route::get('/products/create', ProductController::class, 'create');
    Route::post('/products/store', ProductController::class, 'store');
});