<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// admin panel

// product start
Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])
    ->name('admin_product_list');
Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])
    ->name('admin_product_add');
Route::post('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])
    ->name('admin_product_save');
Route::get('/admin/product/edit/{product}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])
    ->name('admin_product_edit');
Route::put('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])
    ->name('admin_product_update');
Route::delete('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])
    ->name('admin_product_delete');
Route::delete('/admin/product/media/{media}', [App\Http\Controllers\Admin\ProductController::class, 'deleteMedia'])
    ->name('admin_product_media_delete');
// product end

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])
    ->name('admin_home');

Route::get('/product', [ProductController::class, 'index'])
    ->name('product_list');


Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product_detail');

Route::get('/{gender}/product', [ProductController::class, 'genderFilter'])
    ->name('gender_product_list');
