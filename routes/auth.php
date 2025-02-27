<?php

use AnkorFramework\App\Route\Route;
use src\controllers\HomeController;
use src\controllers\ProductController;

Route::middleware(["guest"])->group(function () {
    Route::get('/contact', HomeController::class, 'contact');
});

Route::middleware("auth")->group(function () {
    // create product
    Route::get('/products/create', ProductController::class, 'create');
    Route::post('/products/store', ProductController::class, 'store');
});