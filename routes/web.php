<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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


// TRANSACTION ROUTE
Route::post('/transaction/webhook', [TransactionController::class, 'webhook'])->withoutMiddleware(VerifyCsrfToken::class)->name('webhook');


// ADMIN Route
Route::prefix('admin')->middleware(['verified', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        // Matches The "/admin/users" URL
        return view('admin.dashboard');

    })->name("dashboard");
});


// MERCHANT ROUTE
Route::prefix('merchant')->middleware(['verified', 'merchant'])->name('merchant.')->group(function () {
    Route::get('/dashboard', function () {
        // Matches The "/admin/users" URL
        return view('merchant.dashboard');

    })->name("dashboard");
});



