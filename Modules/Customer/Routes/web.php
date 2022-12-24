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
Route::get('customer/{customer}/confirm-delete', [\Modules\Customer\Http\Controllers\CustomerController::class, 'confirmDelete'])->name('customer.confirm_delete');
Route::resource('customer', CustomerController::class);
