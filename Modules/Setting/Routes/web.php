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


    Route::get('/additional-field/{field}/delete', 'SettingController@deleteAdditionalField')->name('setting.delete_additional_field');
    Route::get('/additional-field', 'SettingController@getAdditionalFieldsPage')->name('setting.additional_fields');
    Route::post('/additional-field', 'SettingController@postAdditionalField')->name('setting.post_additional_fields');
    Route::patch('/additional-field/{field}', 'SettingController@updateAdditionalField')->name('setting.update_additional_fields');


});
Route::middleware(['auth'])->group(function () {

    Route::get('customview/model-ajax-list', [\Modules\Setting\Http\Controllers\CustomViewController::class, 'getAjaxList'])->name('customview.ajax_list');
    Route::get('customview/{customview}/confirm-delete', [\Modules\Setting\Http\Controllers\CustomViewController::class, 'confirmDelete'])->name('customview.confirm_delete');
    Route::resource('customview', 'CustomViewController');
});

