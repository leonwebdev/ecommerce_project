<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::get('/cart/add/{id}', [CartController::class, 'create'])->name('createCart');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('updateCart');
