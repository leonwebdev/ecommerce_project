<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/test', [HomeController::class, 'test']);

 Route::get('/about', [AboutController::class, 'about']);
 Route::get('/contact', [ContactController::class, 'contact']);
 Route::get('/terms-and-conditions', [TermsController::class, 'terms']);

