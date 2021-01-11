<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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


Route::prefix('admin')->middleware(['verified', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        // Matches The "/admin/users" URL
        return view('dashboard');

    })->name("dashboard");
});

Route::prefix('merchant')->middleware(['verified', 'merchant'])->name('merchant.')->group(function () {
    Route::get('/dashboard', function () {
        // Matches The "/admin/users" URL
        return view('merchant.dashboard');

    })->name("dashboard");
});



