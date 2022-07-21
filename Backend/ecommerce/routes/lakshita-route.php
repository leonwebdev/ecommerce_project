<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;


// Route::get('/test', [HomeController::class, 'test']);

 Route::get('/about', [AboutController::class, 'index']);
 Route::get('/contact', [ContactController::class, 'index']);
 Route::get('/terms-and-conditions', [TermsController::class, 'index']);
 Route::get('/404', [PageNotFoundController::class, 'index']);

