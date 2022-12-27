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

Route::get('taskstatus/{taskstatus}/confirm-delete', [\Modules\Task\Http\Controllers\TaskStatusController::class, 'confirmDelete'])->name('taskstatus.confirm_delete');
Route::resource('taskstatus', \Modules\Task\Http\Controllers\TaskStatusController::class);

Route::get('taskcategory/{taskcategory}/confirm-delete', [\Modules\Task\Http\Controllers\TaskCategoryController::class, 'confirmDelete'])->name('taskcategory.confirm_delete');
Route::resource('taskcategory', \Modules\Task\Http\Controllers\TaskCategoryController::class);
