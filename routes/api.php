<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products', [ProductController::class, 'index'])->name('get-products');

Route::post('/products', [ProductController::class, 'store'])->name('store-products');

Route::delete('/products', [ProductController::class, 'destroy'])->name('delete-products');

Route::fallback(function () {
    return response()->json([
      'status'=>'Error',
      'message' => 'Oops, Route not found!'
    ], 404);
});
