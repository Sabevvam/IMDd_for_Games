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
    Route::post(uri: '/test', action: function () {
        include_once  APP_PATH.'/views/pages/games.php';
    }),

];
