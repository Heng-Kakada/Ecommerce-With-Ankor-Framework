<?php

use AnkorFramework\App\Route\Route;
use src\controllers\user\AuthController;
use src\controllers\user\HomeController;
use src\controllers\dashboard\DashboardController;
use src\controllers\dashboard\DashBoardUserController;
use src\controllers\dashboard\DashBoardProductController;
use src\controllers\dashboard\DashBoardCategoryController;

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', AuthController::class, 'logout');
    Route::get('/profile/{id}', AuthController::class, 'profile');
    Route::post('/profile/store', AuthController::class, 'storeProfile');

    Route::get('/contact', HomeController::class, 'contact');
});

Route::middleware(['auth', 'manager', 'admin'])->group(function () {
    Route::get('/admin', DashboardController::class, 'index');

    //product route
    Route::get('/admin/products', DashBoardProductController::class, 'index'); // list products
    Route::get('/admin/products/{id}', DashBoardProductController::class, 'show'); // show product detail (view)
    Route::get('/admin/products/create', DashBoardProductController::class, 'create'); // load create product view
    Route::post('/admin/products/store', DashBoardProductController::class, 'store'); // store product to db
    Route::get('/admin/products/edit/{id}', DashBoardProductController::class, 'edit'); //load update product view
    Route::put('/admin/products/edit', DashBoardProductController::class, 'update'); // update existing product
    Route::delete('/admin/products/delete', DashBoardProductController::class, 'destroy');


    //category route
    Route::get('/admin/categories', DashBoardCategoryController::class, 'index');
    Route::get('/admin/categories/create', DashBoardCategoryController::class, 'create');
    Route::post('/admin/categories/store', DashBoardCategoryController::class, 'store');
    Route::get('/admin/categories/edit/{id}', DashBoardCategoryController::class, 'edit'); // {id}/edit
    Route::put('/admin/categories/edit', DashBoardCategoryController::class, 'update');
    Route::delete('/admin/categories/delete', DashBoardCategoryController::class, 'destroy');

    //

    Route::get('/admin/file_upload', DashboardController::class, 'file_upload');
    Route::post('/admin/upload', DashboardController::class, 'upload');
});

Route::middleware(['auth', 'admin'])->group(function () {
    //user route
    Route::get('/admin/users', DashBoardUserController::class, 'index'); // list products
    Route::get('/admin/users/{id}', DashBoardUserController::class, 'show'); // show product detail (view)
    Route::get('/admin/users/create', DashBoardUserController::class, 'create'); // load create product view
    Route::post('/admin/users/store', DashBoardUserController::class, 'store'); // store product to db
    Route::get('/admin/users/edit/{id}', DashBoardUserController::class, 'edit'); //load update product view
    Route::put('/admin/users/edit', DashBoardUserController::class, 'update'); // update existing product
    Route::delete('/admin/users/delete', DashBoardUserController::class, 'destroy');
});