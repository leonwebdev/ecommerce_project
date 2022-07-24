<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\OrderHistoryController;

// Route::get('/ltest', function () {
//     return User::find(2)->user_addresses;
// });

/*
 ---------  Normal User Routes -------------------------------------------
 */
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile-edit');
Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::get('/address/edit/{user_address}', [UserAddressController::class, 'edit'])->name('address-edit');
Route::put('/address/{id}', [UserAddressController::class, 'update']);
Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order-history');

/*
 ---------  Admin User Routes -------------------------------------------
 */
// Route::middleware(['auth', 'admin'])->group(function () {
// });
Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/user/edit/{user}', [UserController::class, 'edit'])->name('admin_user_edit');
Route::put('/admin/user/{id}', [UserController::class, 'update']);
// Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin_user_add');
// Route::post('/admin/user', [UserController::class, 'store']);
Route::delete('/admin/user/{id}', [UserController::class, 'destroy']);