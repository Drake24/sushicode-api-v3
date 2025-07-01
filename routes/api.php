<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticateController::class, 'authenticate']);

Route::apiResource('users', RegisteredUserController::class);

Route::group(['middleware' => 'auth:api'], function () {
    // additional routes goes here

});
