<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;


// Route::get('/test', [HomeController::class, 'test']);

Route::get('/ltest', function () {
    return User::find(2)->user_addresses;
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');