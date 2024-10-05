<?php

use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(
    function () {
        Route::resource('/products', ProductsController::class)->except('show')->names('admin.products');
    }
);
