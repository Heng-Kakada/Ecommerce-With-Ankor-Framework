<?php

use AnkorFramework\Core\Route\Route;
use src\controllers\ContactController;
use src\controllers\ProductController;

Route::middleware("guest")->group(function () {
    Route::get('/contact', ContactController::class, 'index');
});

Route::middleware("auth")->group(function () {
    // create product
    Route::get('/products/create', ProductController::class, 'create');
    Route::post('/products/store', ProductController::class, 'store');
});