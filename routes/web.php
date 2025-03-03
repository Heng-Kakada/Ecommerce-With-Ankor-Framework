<?php

use src\controllers\dashboard\DashBoardUserController;
use src\controllers\user\AuthController;
use src\controllers\dashboard\DashBoardCategoryController;
use src\controllers\dashboard\DashboardController;
use src\controllers\user\CartController;
use src\controllers\user\CategoryController;
use src\controllers\user\HomeController;
use src\controllers\dashboard\DashBoardProductController;
use AnkorFramework\App\Route\Route;
use src\controllers\user\ProductController;


// write your routes here
Route::get('/', HomeController::class, 'index');
Route::get('/about', HomeController::class, 'about');


Route::get("/login", AuthController::class, 'login');
Route::post('/login-execute', AuthController::class, 'store');

Route::get('/signup', AuthController::class, 'signup');
Route::post('/register', AuthController::class, 'register');
Route::get('/forgot', AuthController::class, 'forgot');


/* 
    All Product Route
*/

Route::get('/shop', ProductController::class, 'index');
Route::get('/product/{id}', ProductController::class, 'show');

/* 
    All Category Route
*/

Route::get('/categories/{slug}', CategoryController::class, 'show');


/* 
    Cart Route
*/
Route::get('/cart', CartController::class, 'index');






require_once "auth.php";