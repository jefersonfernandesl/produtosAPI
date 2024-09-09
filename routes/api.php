<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'all')->name('productos.all');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
