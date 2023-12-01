<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{id}', [ProductController::class, 'show'])->name('product');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-to-cart/{id}', [CartController::class, 'updateToCart'])->name('update.to.cart');
Route::delete('/delete-from-cart/{id}', [CartController::class, 'delete'])->name('delete.from.cart');
