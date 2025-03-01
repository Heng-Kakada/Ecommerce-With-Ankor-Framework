<?php

use AnkorFramework\App\Route\Route;
use src\controllers\user\AuthController;

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', AuthController::class, 'logout');
});

Route::middleware(['auth', 'manager', 'admin'])->group(function () {

});

Route::middleware(['auth', 'admin'])->group(function () {

});