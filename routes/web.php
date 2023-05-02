<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/redirect', [AuthController::class, 'redirectToProvider'])->middleware('web');
Route::get('/auth/callback', [AuthController::class, 'handleProviderCallback'])->middleware('web');
