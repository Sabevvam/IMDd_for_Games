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
    Route::get('/login', [\App\Controllers\LoginController::class, 'index']),
    Route::post('/login', [\App\Controllers\LoginController::class, 'login']),
    Route::post('/logout', [\App\Controllers\LoginController::class, 'logout']),
    Route::get('/admin', [\App\Controllers\AdminController::class, 'index']),
    Route::get('/admin/categories/add', [\App\Controllers\CategoryController::class, 'create']),
    Route::post('/admin/categories/add', [\App\Controllers\CategoryController::class, 'store']),
    Route::post('/admin/categories/destroy', [\App\Controllers\CategoryController::class, 'destroy']),
    Route::get('/admin/categories/update', [\App\Controllers\CategoryController::class, 'edit']),
    Route::post('/admin/categories/update', [\App\Controllers\CategoryController::class, 'update']),
    Route::get('/admin/games/add', [\App\Controllers\GamesController::class, 'create']),
    Route::post('/admin/games/add', [\App\Controllers\GamesController::class, 'store']),
    Route::post('/admin/games/destroy', [\App\Controllers\GamesController::class, 'destroy']),
    Route::get('/admin/games/update', [\App\Controllers\GamesController::class, 'edit']),
    Route::post('/admin/games/update', [\App\Controllers\GamesController::class, 'update']),
];
