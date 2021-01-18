<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/shop/{slug}/order', [ShopController::class, 'order'])->name('order');
Route::post('/shop/{slug}/validate', [ShopController::class, 'validate'])->name('validate');
Route::post('/shop/{slug}/activate', [ShopController::class, 'activate'])->name('activate');
