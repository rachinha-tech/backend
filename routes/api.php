<?php

use App\Http\Controllers\ModalityController;
use App\Http\Controllers\TeamsDrawController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ValidateAuthTokenController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy']);

Route::get('/teams-draw', [TeamsDrawController::class, 'index']);

Route::prefix('/modalities')->group(function () {
    Route::get('/', [ModalityController::class, 'index']);
    Route::post('/', [ModalityController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/profile', ValidateAuthTokenController::class);

        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::patch('/level/{id}', [UserController::class, 'level']);
    });
});
