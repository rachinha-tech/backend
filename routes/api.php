<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/auth')->group(function () {
    Route::get('/redirect', [AuthController::class, 'redirectToProvider']);
});


//Route::group(['middleware' => ['api']], function () {
//    // your routes here
//    Route::get('/home', [AuthController::class, 'handleProviderCallback']);
//});


//Route::prefix('/location')->group(function () {
//    Route::get('/', [LocationController::class, 'index']);
//    Route::post('/', [LocationController::class, 'store']);
//});
