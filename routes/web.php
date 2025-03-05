<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/products', [ProductController::class, 'products'])->name('products');

// Route::get('/products', [ProductController::class, 'show']);
// Route::post('/add-products', [ProductController::class, 'store'])->name('product');
// Route::get('/get-products', [ProductController::class, 'getProducts']);  
// Route::get('/get-product/{id}', [ProductController::class, 'edit_product']);
// Route::post('/update-products/{id}', [ProductController::class, 'update']);
// Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
// Route::get('/search-products', [ProductController::class, 'search']);
// Route::get('/home', [ProductController::class, 'products'])->name('home');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/index', [ProductController::class, 'products'])->name('index');
    Route::get('/show', [ProductController::class, 'show'])->name('show');
    Route::get('/detail', [ProductController::class, 'detail'])->name('detail');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('edit_product/{id}', [ProductController::class, 'edit_product'])->name('products.edit');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/{id}', [ProductController::class, 'ProductDetails'])->name('products.show');
});

Route::prefix('brands')->name('brands.')->group(function () {
    Route::get('/index', [BrandController::class, 'index'])->name('index'); // List all brands
    Route::post('/create', [BrandController::class, 'create'])->name('create'); // Show form to create a brand
    Route::post('/', [BrandController::class, 'store'])->name('store'); // Store a new brand
    Route::get('/{brand}', [BrandController::class, 'show'])->name('show'); // Show a single brand
    Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('edit'); // Show form to edit a brand
    Route::put('/{brand}', [BrandController::class, 'update'])->name('update'); // Update a brand
    Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy'); // Delete a brand
});

Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class);
});

Route::middleware(['admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    // Route::resource('products', ProductController::class);
});

Route::middleware(['customer'])->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});