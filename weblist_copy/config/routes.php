<?php

use App\Controllers\GamesController;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;
use App\Middleware\AuthMiddleware;


// Routes
return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'register']),
];
