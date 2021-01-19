<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\VerifyCsrfToken;

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

Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('home');


// SHOPPING Route
Route::get('/shop/{slug}', [ShopController::class, 'index'])->name('shop');
Route::post('/shop/test', [ShopController::class, 'update'])->name('test');
Route::get('/shop/{slug}/cart', [ShopController::class, 'cart'])->name('cart');
Route::post('/shop/{slug}/checkout', [ShopController::class, 'checkout'])->name('checkout');


// TRANSACTION ROUTE (Webhook)
Route::post('/transaction/webhook', [TransactionController::class, 'webhook'])->withoutMiddleware(VerifyCsrfToken::class)->name('webhook');


// ADMIN Route
Route::prefix('admin')->middleware(['verified', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name("dashboard");
    Route::get('/product', [ProductController::class, 'admin_product'])->name('product');
    Route::get('/order', [OrderController::class, 'admin_order'])->name('order');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('delete-product');
});


// MERCHANT ROUTE
Route::prefix('merchant')->middleware(['verified', 'merchant'])->name('merchant.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'merchant_dashboard'])->name("dashboard");
    Route::get('/product', [ProductController::class, 'merchant_product'])->name('product');
    Route::get('/order', [OrderController::class, 'merchant_order'])->name('order');

    Route::get('/product/new', function () {
        return view('merchant.new_product', ['shop' => Auth::user()]);
    })->name('new-product-page');

    Route::post('/product/new', [ProductController::class, 'merchant_create'])->name('new-product');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('delete-product');
});
Route::get('/merchant/activate', function(){
    return view('merchant.activate');
})->name('activate');



