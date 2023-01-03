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
    Route::get('commessa/{commessa}/confirm-delete', [\Modules\Commessa\Http\Controllers\CommessaController::class, 'confirmDelete'])->name('commessa.confirm_delete');
    Route::resource('commessa', \Modules\Commessa\Http\Controllers\CommessaController::class);

});
