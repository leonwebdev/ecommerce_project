<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageNotFoundController;
use App\Http\Controllers\Admin\CategoryController;



// Route::get('/test', [HomeController::class, 'test']);

 Route::get('/about', [AboutController::class, 'index']);
 Route::get('/contact', [ContactController::class, 'index']);
 Route::get('/terms-and-conditions', [TermsController::class, 'index']);
 Route::get('/404', [PageNotFoundController::class, 'index']);
 Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

