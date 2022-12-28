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
Route::middleware(['auth'])->prefix('setting')->group(function () {
    Route::get('productcategory/{productcategory}/confirm-delete', [Modules\Product\Http\Controllers\ProductCategoryController::class, 'confirmDelete'])->name('productcategory.confirm_delete');
    Route::resource('productcategory', ProductCategoryController::class);

    Route::get('product/{product}/confirm-delete', [Modules\Product\Http\Controllers\ProductController::class, 'confirmDelete'])->name('product.confirm_delete');
    Route::resource('product', ProductController::class);
});


