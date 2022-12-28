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


Route::middleware(['auth'])->group(function () {
    Route::get('contract/{contract}/confirm-delete', [\Modules\Contract\Http\Controllers\ContractController::class, 'confirmDelete'])->name('contract.confirm_delete');
    Route::resource('contract', ContractController::class);

    Route::get('contractstatus/{contractstatus}/confirm-delete', [\Modules\Contract\Http\Controllers\ContractStatusController::class, 'confirmDelete'])->name('contractstatus.confirm_delete');
    Route::resource('contractstatus', ContractStatusController::class);

    Route::get('contractcategory/{contractcategory}/confirm-delete', [\Modules\Contract\Http\Controllers\ContractCategoryController::class, 'confirmDelete'])->name('contractcategory.confirm_delete');
    Route::resource('contractcategory', ContractCategoryController::class);
});


