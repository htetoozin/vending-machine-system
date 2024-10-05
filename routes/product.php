<?php

use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(
    function () {
        Route::resource('/products', ProductsController::class)->names('admin.products');

        Route::get('/products/{product}/purchase', [ProductsController::class, 'createPurchase'])->name('admin.purchases.create');
        Route::post('/products/{product}/purchase', [ProductsController::class, 'storePurchase'])->name('admin.purchases.store');
    }
);
