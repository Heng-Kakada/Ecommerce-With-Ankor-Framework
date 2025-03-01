<?php

use src\controllers\user\AuthController;
use src\controllers\dashboard\DashBoardCategoryController;
use src\controllers\dashboard\DashboardController;
use src\controllers\user\CartController;
use src\controllers\user\HomeController;
use src\controllers\dashboard\DashBoardProductController;
use AnkorFramework\App\Route\Route;
use src\controllers\user\ProductController;


// write your routes here
Route::get('/', HomeController::class, 'index');
Route::get('/about', HomeController::class, 'about');
Route::get('/contact', HomeController::class, 'contact');

Route::get("/login", AuthController::class, 'login');
Route::post('/login-execute', AuthController::class, 'store');
Route::get('/shop', ProductController::class, 'index');

Route::get('/cart', CartController::class, 'index');

/* 
    All admin Route
*/

Route::get('/admin', DashboardController::class, 'index');


//product route
Route::get('/admin/products', DashBoardProductController::class, 'index'); // list products
Route::get('/admin/products/{id}', DashBoardProductController::class, 'show'); // show product detail (view)
Route::get('/admin/products/create', DashBoardProductController::class, 'create'); // load create product view
Route::post('/admin/products/store', DashBoardProductController::class, 'store'); // store product to db
Route::put('/admin/products/{id}/edit', DashBoardProductController::class, 'update'); // update existing product


//category route
Route::get('/admin/categories', DashBoardCategoryController::class, 'index');
Route::get('/admin/categories/create', DashBoardCategoryController::class, 'create');
Route::post('/admin/categories/store', DashBoardCategoryController::class, 'store');
Route::get('/admin/categories/edit/{id}', DashBoardCategoryController::class, 'edit'); // {id}/edit
Route::put('/admin/categories/edit', DashBoardCategoryController::class, 'update');
Route::delete('/admin/categories/delete', DashBoardCategoryController::class, 'destroy');


//user route
Route::get('/admin/users', DashBoardProductController::class, 'index');
// Route::get('/products/{id}', ProductController::class, action: 'show');

require_once "auth.php";