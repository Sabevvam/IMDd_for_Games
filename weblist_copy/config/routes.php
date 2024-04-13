<?php

use App\Controllers\GamesController;
use App\Controllers\HomeController;
use App\Kernel\Router\Route;


// Routes
return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/games',[GamesController::class, 'index']),
    Route::get('/admin/games/add',[GamesController::class, 'add']),
    Route::post('/admin/games/add',[GamesController::class, 'store']),
    Route::get('/register', [\App\Controllers\RegisterController::class, 'index']),
    Route::post('/register', [\App\Controllers\RegisterController::class, 'register']),
    Route::get('/login', [\App\Controllers\LoginController::class, 'index']),
    Route::post('/login', [\App\Controllers\LoginController::class, 'login']),

];
