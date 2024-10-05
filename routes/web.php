<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




//auth route
require __DIR__ . '/auth.php';

//user route
require __DIR__ . '/user.php';

//product route
require __DIR__ . '/product.php';
