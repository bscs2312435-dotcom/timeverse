<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
// home
Route::get('/', function () {
    return view('home');
})->name('home');


// 🛍️ Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// 🛒 Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update-quantity/{index}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// 💳 Checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// ⭐ Product Details + Reviews
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{id}/review', [ProductController::class, 'addReview'])->name('product.review');

// 🧾 Order Confirmation
Route::get('/order/confirmation', function () {
    Session::forget('cart');
    return view('order-confirmation');
})->name('order.confirmation');

// ℹ️ Pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
