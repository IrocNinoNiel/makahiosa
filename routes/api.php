<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{id}',[App\Http\Controllers\MessageController::class,'users']);
Route::get('/user/{id}',[App\Http\Controllers\MessageController::class,'currentUser']);
Route::get('/message/{to}/{from}',[App\Http\Controllers\MessageController::class,'getCurrentMessages']);
Route::post('/message',[App\Http\Controllers\MessageController::class,'storeMessage']);
