<?php

use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomepageController::class, '__invoke'])->name('index');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products/store', [ProductController::class, 'import'])->name('products.store');
