<?php

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

Route::get('product/{product}/confirm-delete', [Modules\Product\Http\Controllers\ProductController::class, 'confirmDelete'])->name('product.confirm_delete');
Route::resource('product', ProductController::class);

