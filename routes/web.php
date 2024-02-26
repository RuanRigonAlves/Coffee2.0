<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ReviewsController;
use App\Models\Product;
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

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('home');
});

Route::resource('products.reviews', ReviewsController::class)->scoped(['review' => 'product'])->only(['create', 'store']);

// Route::resource('register', RegisterUserController::class);

// Route::resource('login', LoginUserController::class);

Route::get('register', [RegisterUserController::class, 'index'])->name('register.index');

Route::post('register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('login', [LoginUserController::class, 'index'])->name('login.index');

Route::post('login', [LoginUserController::class, 'store'])->name('login.store');

Route::post('logout', [LoginUserController::class, 'logout'])->name('login.logout');
