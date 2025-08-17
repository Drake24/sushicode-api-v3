<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticateController::class, 'authenticate']);
Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);

Route::apiResource('users', UserController::class);

Route::group(['middleware' => 'auth:api'], function () {
    // additional routes goes here
    Route::apiResource('profile', ProfileController::class);
});
