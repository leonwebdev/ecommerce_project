<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/test', [HomeController::class, 'test']);

 Route::get('/about', [AboutController::class, 'index']);
 Route::get('/contact', [ContactController::class, 'index']);
 Route::get('/terms-and-conditions', [TermsController::class, 'index']);

