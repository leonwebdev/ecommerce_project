<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::get('/cart/add/{id}', [CartController::class, 'create'])->name('createCart');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('updateCart');
Route::get('/cart/checkout', [CartController::class, 'checkoutCart'])->name('checkoutCart');
Route::get('/cart/address/update', [CartController::class, 'updateShippingAddress'])->name('updateShippingAddress');
Route::get('/cart/billing', [CartController::class, 'processToBilling'])->name('processToBilling');
Route::get('/cart/billing/shipping', [CartController::class, 'fillBillingForm'])->name('fillBillingForm');
