<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// 1. Auth routes (Login, Register...)
Auth::routes();

// 2. User-facing pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('products.show');

// 3. Cart (AJAX)
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/cap-nhat', [CartController::class, 'update'])->name('cart.update');
Route::post('/gio-hang/xoa', [CartController::class, 'remove'])->name('cart.remove');

// 4. Checkout
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
Route::post('/thanh-toan', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('auth');
Route::get('/dat-hang-thanh-cong/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// 5. Admin routes
require __DIR__.'/web.admin.php';

use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

use App\Http\Controllers\OrderController;
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

