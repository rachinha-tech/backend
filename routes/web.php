<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/auth')->group(function () {
    Route::get('/redirect', [AuthController::class, 'redirectToProvider']);
    Route::get('/callback', [AuthController::class, 'handleProviderCallback']);
});
