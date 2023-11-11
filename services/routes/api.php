<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['prefix' => 'profile'], function() {
    Route::get('/', [AuthController::class, 'user'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'rating'], function() {
    Route::post('/create', [RatingController::class, 'create']);
});