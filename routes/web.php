<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Acme\RandomStringGenerator\RandomStringGenerator;
use Drake24\Lynx\Lynx;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('test', function () {
    info('test');
    Lynx::connect();
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        info(RandomStringGenerator::generate(5));
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
