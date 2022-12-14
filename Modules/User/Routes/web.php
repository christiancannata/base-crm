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
    Route::get('user/{user}/leave-impersonate', [\Modules\User\Http\Controllers\UserController::class, 'leaveImpersonate'])->name('user.impersonate_leave');
    Route::get('user/{user}/impersonate', [\Modules\User\Http\Controllers\UserController::class, 'impersonate'])->name('user.impersonate');
    Route::get('user/{user}/confirm-delete', [\Modules\User\Http\Controllers\UserController::class, 'confirmDelete'])->name('user.confirm_delete');
    Route::resource('user', \Modules\User\Http\Controllers\UserController::class);

    Route::get('role/{role}/confirm-delete', [\Modules\User\Http\Controllers\RoleController::class, 'confirmDelete'])->name('role.confirm_delete');
    Route::resource('role', RoleController::class);
});



