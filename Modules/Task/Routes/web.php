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


Route::get('task/{task}/confirm-delete', [\Modules\Task\Http\Controllers\TaskController::class, 'confirmDelete'])->name('task.confirm_delete');
Route::resource('task', \Modules\Task\Http\Controllers\TaskController::class);

Route::resource('taskstatus', \Modules\Task\Http\Controllers\TaskStatusController::class);
Route::resource('taskcategory', \Modules\Task\Http\Controllers\TaskCategoryController::class);
