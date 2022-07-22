<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/test', [HomeController::class, 'test']);
Route::get('/ltest', function () {
    return User::find(2)->user_addresses;
});