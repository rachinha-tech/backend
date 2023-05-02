<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/auth')->group(function () {
    Route::get('/redirect', [AuthController::class, 'redirectToProvider']);
    Route::get('/callback', [AuthController::class, 'handleProviderCallback']);
});
