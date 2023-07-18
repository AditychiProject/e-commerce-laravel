<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

Auth::routes();

// Frontend
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    // Home
    Route::get('/', 'index');
    // Products
    Route::get('/products', 'allProducts');
    // Collections
    Route::get('/collections', 'categories');
    // Products
    Route::get('/collections/{category_slug}', 'products');
    // Product View
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    // New Arrivals
    Route::get('/new-arrivals', 'newArrival');
    // Featured Products
    Route::get('/featured-products', 'featuredProducts');
    // Thank You
    Route::get('/thank-you', 'thankyou');
    // Search
    Route::get('/search', 'searchProducts');
});

// Register Successfully
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth
Route::middleware(['auth'])->group(function () {
    // Wishlist
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    // Cart
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
});

// Admin Role
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);
    // Product CRUD
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
        Route::get('/products/{product_id}/delete', 'destroy');
    });
    // Category CRUD
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });
    // Brand CRUD
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
});
