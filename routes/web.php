<?php

use src\controllers\AuthController;
use src\controllers\CategoryController;
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

Route::get('/admin/products', ProductController::class, 'index'); // list products
Route::get('/admin/products/{id}', ProductController::class, 'show'); // show product detail (view)

Route::get('/admin/products/create', ProductController::class, 'create'); // load create product view
Route::post('/admin/products/store', ProductController::class, 'store'); // store product to db


Route::put('/admin/products/{id}/edit', ProductController::class, 'update'); // update existing product


//category route

Route::get('/admin/categories', CategoryController::class, 'index');


Route::get('/admin/categories/create', CategoryController::class, 'create');
Route::post('/admin/categories/store', CategoryController::class, 'store');

Route::get('/admin/categories/edit/{id}', CategoryController::class, 'edit'); // {id}/edit
Route::put('/admin/categories/edit', CategoryController::class, 'update');

Route::delete('/admin/categories/delete', CategoryController::class, 'destroy');


//user route
Route::get('/admin/users', ProductController::class, 'index');
// Route::get('/products/{id}', ProductController::class, action: 'show');

require_once "auth.php";