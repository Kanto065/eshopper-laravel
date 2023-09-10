<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ShopDetailController;
use App\Http\Controllers\Frontend\ShoppingCartController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/detail', [ShopDetailController::class, 'index']);
Route::get('/cart', [ShoppingCartController::class, 'index']);
