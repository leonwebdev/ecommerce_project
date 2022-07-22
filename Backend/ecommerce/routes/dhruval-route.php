<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// admin panel
Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])
    ->name('admin_product_list');
Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])
    ->name('admin_product_add');
Route::post('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])
    ->name('admin_product_save');

Route::get('/product', [ProductController::class, 'index'])
    ->name('product_list');


Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product_detail');

Route::get('/{gender}/product', [ProductController::class, 'genderFilter'])
    ->name('gender_product_list');
