<?php

use App\Http\Controllers\Api\V1\ProductsController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::controller(ProductsController::class)->group(function () {
        Route::get('/products', 'all')->name('products.all');
        Route::post('/products', 'store')->name('products.create');
    });
});
