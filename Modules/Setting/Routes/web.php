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

Route::prefix('setting')->group(function () {


    Route::get('/additional-field/{field}/delete', 'SettingController@deleteAdditionalField')->name('setting.delete_additional_field');
    Route::get('/additional-field', 'SettingController@getAdditionalFieldsPage')->name('setting.additional_fields');
    Route::post('/additional-field', 'SettingController@postAdditionalField')->name('setting.post_additional_fields');

});
