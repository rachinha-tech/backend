<?php

use App\Http\Controllers\ConvenienceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamsDrawController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ValidateAuthTokenController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/teams-draw', [TeamsDrawController::class, 'store']);

Route::prefix('modalities')->group(function () {
    Route::get('/', [ModalityController::class, 'index']);
    Route::post('/', [ModalityController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/profile', ValidateAuthTokenController::class);

        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::patch('/level/{id}', [UserController::class, 'level']);
    });

    Route::prefix('locals')->group(function () {
        Route::get('/', [LocalController::class, 'index']);
        Route::get('/{id}', [LocalController::class, 'show']);
        Route::post('/', [LocalController::class, 'store']);
        Route::put('/{id}', [LocalController::class, 'update']);
        Route::delete('/{id}', [LocalController::class, 'destroy']);
    });

    Route::prefix('conveniences')->group(function () {
        Route::get('/{id}', [ConvenienceController::class, 'show']);
        Route::post('/', [ConvenienceController::class, 'store']);
    });

    Route::prefix('events')->group(function () {
        Route::get('/{id}', [EventController::class, 'show']);
        Route::post('/', [EventController::class, 'store']);
    });

    Route::prefix('schedules')->group(function () {
        Route::get('/', [ScheduleController::class, 'index']);
        Route::post('/', [ScheduleController::class, 'store']);
    });
});
