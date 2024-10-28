<?php

use App\Http\Controllers\Balance_userController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User_balanceController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\User_balance;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', function () {
    return view('customer_page');
})->name('customer');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('products/trashed',[ProductController::class,'trashe'])->name('products.trashed');
Route::delete('products/{id}/force_delete',[ProductController::class,'forceDelete'])->name('products.force_delete');
Route::get('products/{id}/restore',[ProductController::class,'restore'])->name('products.restore');
Route::post('products/search',[ProductController::class,'search'])->name('products.search');

Route::get('categories/trashed',[CategoryController::class,'trashe'])->name('categories.trashed');
Route::delete('categories/{id}/force_delete',[CategoryController::class,'forceDelete'])->name('categories.force_delete');
Route::get('categories/{id}/restore',[CategoryController::class,'restore'])->name('categories.restore');
Route::post('categories/search',[CategoryController::class,'search'])->name('categories.search');

Route::post('orders/{order}/status',[OrderController::class,'updateStatus'])->name('orders.status');
Route::get('orders/{order}/finsh',[OrderController::class,'finsh'])->name('orders.finsh');


Route::resources([

    'categories'    => CategoryController::class,
    'orders'        => OrderController::class,
    'products'      => ProductController::class,
    'users'         => UserController::class,
]);

Auth::routes();

