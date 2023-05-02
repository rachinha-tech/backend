<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->group(function () {
    Route::get('/redirect', [AuthController::class, 'redirectToProvider']);
});

Route::prefix('/auth')->middleware('auth:sanctum')->group(function () {
    Route::get('/callback', [AuthController::class, 'handleProviderCallback']);
});
