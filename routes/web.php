<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::view('/', 'pages.HomeLoremket')->name('view.homeLoremket');

//Products
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('category/{category}',[ProductController::class, 'category'])->name('product.category');
Route::get('tag/{tag}', [ProductController::class, 'tag'])->name('product.tag');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
