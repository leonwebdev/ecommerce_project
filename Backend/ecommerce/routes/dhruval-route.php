<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/product', [ProductController::class, 'index'])
    ->name('product_list');


Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product_detail');

Route::get('/{gender}/product', [ProductController::class, 'genderFilter'])
    ->name('gender_product_list');
