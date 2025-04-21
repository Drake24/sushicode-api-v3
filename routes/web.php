<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/lynx', function () {
    $lynx = app(\Drake24\Lynx::class);
    return $lynx->connect();
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        info('test');
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
