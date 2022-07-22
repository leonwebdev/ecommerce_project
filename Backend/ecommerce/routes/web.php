<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test']);

require __DIR__ . '/dhruval-route.php';
require __DIR__ . '/lihang-route.php';
require __DIR__ . '/jenny-route.php';
require __DIR__ . '/lakshita-route.php';