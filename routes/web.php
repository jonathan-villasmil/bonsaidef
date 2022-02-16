<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

Route::get('category/{category}', [ProductController::class, 'category'])->name('products.category');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
