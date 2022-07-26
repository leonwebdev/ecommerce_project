<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


// Route::get('/test', [HomeController::class, 'test']);
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
