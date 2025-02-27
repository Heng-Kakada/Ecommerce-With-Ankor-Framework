<?php

use src\controllers\AuthController;
use src\controllers\HomeController;
use AnkorFramework\App\Route\Route;


// write your routes here
Route::get('/', HomeController::class, 'index');
Route::get("/login", AuthController::class, 'login');
Route::post('/login-execute', AuthController::class, 'store');



require_once "auth.php";