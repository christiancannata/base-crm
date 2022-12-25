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


Route::get('contract/{contract}/confirm-delete', [\Modules\Contract\Http\Controllers\ContractController::class, 'confirmDelete'])->name('contract.confirm_delete');
Route::resource('contract', ContractController::class);
Route::resource('contractstatus', ContractStatusController::class);
