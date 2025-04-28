<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function() {
    Route::prefix('/auth')->group(function() {
        Route::post('/signup', [AuthController::class, 'signup']);
        Route::post('/signin', [AuthController::class, 'signin']);
        Route::post('/signout', [AuthController::class, 'signout'])->middleware('auth');
    });    

    Route::middleware('auth')->group(function() {
        Route::middleware('role:admin')->group(function() {
            Route::resource('/admins', AdminController::class);
            Route::resource('/users', UserController::class);
        });
    });

    Route::resource('/games', GamesController::class);
});