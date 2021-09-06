<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\CategoryController@index'
]);

// add to cart
Route::get('products/add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('addToCart');

// show cart
Route::get('products/show-cart', [App\Http\Controllers\ProductController::class, 'showCart'])->name('showCart');

// update cart
Route::get('products/update-cart', [App\Http\Controllers\ProductController::class, 'updateCart'])->name('updateCart');

// delete cart
Route::get('products/delete-cart', [App\Http\Controllers\ProductController::class, 'deleteCart'])->name('deleteCart');

// checkout
// Route::get('products/checkout-cart', [App\Http\Controllers\ProductController::class, 'checkoutCart'])->name('checkoutCart');
Route::get('/login-checkout', [App\Http\Controllers\CheckoutController::class, 'loginCheckout'])->name('loginCheckout');
Route::get('/logout-checkout', [App\Http\Controllers\CheckoutController::class, 'logoutCheckout'])->name('logoutCheckout');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/add-customer', [App\Http\Controllers\CheckoutController::class, 'addCustomer'])->name('addCustomer');
Route::post('/login-customer', [App\Http\Controllers\CheckoutController::class, 'loginCustomer'])->name('loginCustomer');
Route::post('/save-checkout-customer', [App\Http\Controllers\CheckoutController::class, 'saveCheckoutCustomer'])->name('saveCheckoutCustomer');
Route::get('/order', [App\Http\Controllers\CheckoutController::class, 'order'])->name('order');

// order-cart
// Route::post('products/order-cart', [App\Http\Controllers\ProductController::class, 'orderCart'])->name('orderCart');

