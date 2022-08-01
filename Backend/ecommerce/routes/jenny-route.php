<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\TaxController;

Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::get('/cart/add/{id}', [CartController::class, 'create'])->name('createCart');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('updateCart');


Route::middleware(['auth'])->group(function() {

    Route::get('/cart/checkout', [CartController::class, 'checkoutCart'])->name('checkoutCart');
    Route::get('/cart/address/update', [CartController::class, 'updateShippingAddress'])->name('updateShippingAddress');
    Route::get('/cart/billing', [CartController::class, 'processToBilling'])->name('processToBilling');
    Route::get('/cart/billing/use-shipping', [CartController::class, 'useShippingAsBilling'])->name('useShippingAsBilling');
    Route::get('/cart/billing/credit-card', [CartController::class, 'showCreditCardForm'])->name('showCreditCardForm');
    Route::post('/cart/order', [CartController::class, 'storeOrder'])->name('storeOrder');

});

Route::middleware(['auth', 'admin'])->group(function() {

    // Admin Tax Route
    Route::get('/admin/tax', [TaxController::class, 'index'])
    ->name('adminTaxIndex');
    Route::get('/admin/tax/create',[App\Http\Controllers\Admin\TaxController::class, 'create'])->name('adminTaxCreate');;
    Route::post('/admin/tax',[App\Http\Controllers\Admin\TaxController::class, 'store'])->name('adminTaxStore');;
    Route::get('/admin/tax/edit/{tax}',[App\Http\Controllers\Admin\TaxController::class, 'edit'])->name('adminTaxEdit');
    Route::put('/admin/tax/{id}',[App\Http\Controllers\Admin\TaxController::class, 'update'])->name('adminTaxUpdate');
    Route::delete('/admin/tax/{id}', [App\Http\Controllers\Admin\TaxController::class, 'destroy'])->name('adminTaxDestroy');;
    
});