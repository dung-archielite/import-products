<?php

use App\Http\Controllers\AuthController\AuthController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('products', [ProductController::class, '__invoke']);
Route::post('products/store', [ProductController::class, 'import'])->name('products.store');

Route::get('/', function () {
    return view('welcome');
});
