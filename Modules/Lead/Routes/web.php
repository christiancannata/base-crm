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

Route::middleware(['auth'])->prefix('api')->as('api_lead')->group(function () {
    Route::resource('lead', \Modules\Lead\Http\Controllers\Api\LeadController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('lead/{lead}/confirm-delete', [\Modules\Lead\Http\Controllers\LeadController::class, 'confirmDelete'])->name('lead.confirm_delete');
    Route::resource('lead', \Modules\Lead\Http\Controllers\LeadController::class);
});
