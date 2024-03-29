<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInfoController;
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

// Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::resource('products.reviews', ReviewsController::class)->scoped(['review' => 'product'])->only(['create', 'store']);

Route::get('register', [RegisterUserController::class, 'index'])->name('register.index');

Route::post('register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('login', [LoginUserController::class, 'index'])->name('login.index');

Route::post('login', [LoginUserController::class, 'store'])->name('login.store');

Route::post('logout', [LoginUserController::class, 'logout'])->name('login.logout');

Route::get('user', [UserController::class, 'show'])->name('user.show');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::post('cart/{product}', [CartProductsController::class, 'store'])->name('cart_product.store');

Route::post('cart', [CartProductsController::class, 'update'])->name('cart_product.update');

Route::post('order', [OrdersController::class, 'store'])->name('order.store');

Route::get('orders', [OrdersController::class, 'index'])->name('order.index');

Route::delete('cart', [CartProductsController::class, 'destroy'])->name('cart_product.destroy');

Route::get('user_info', [UserInfoController::class, 'index'])->name('user_info.index');

Route::post('user_info', [UserInfoController::class, 'store'])->name('user_info.store');

Route::get('/user/edit', [UserInfoController::class, 'edit'])->name('user_info.edit');

Route::put('/user/edit', [UserInfoController::class, 'update'])->name('user_info.update');

Route::patch('user/isAdmin', [UserInfoController::class, 'isAdmin'])->name('user_info.isAdmin');

Route::get('user/addProduct', [UserInfoController::class, 'addProductPage'])->name('user_info.addProductPage');

Route::post('user/addProduct', [ProductController::class, 'create'])->name('product.create');

Route::get('admin_orders', [OrdersController::class, 'adminOrders'])->name('orders.admin_orders');

Route::get('admin_orders/pending', [OrdersController::class, 'pendingOrdersPage'])->name('orders.pendingOrders');

Route::get('admin_orders/accepted', [OrdersController::class, 'acceptedOrdersPage'])->name('orders.acceptedOrders');

Route::get('admin_orders/completed', [OrdersController::class, 'completedOrdersPage'])->name('orders.completedOrders');

Route::post('admin_orders/{order}/pending', [OrdersController::class, 'pendingOrdersUpdate'])->name('orders.pendingOrdersUpdate');

Route::put('admin_orders/{order}/accepted', [OrdersController::class, 'acceptedOrdersUpdate'])->name('orders.acceptedOrdersUpdate');
