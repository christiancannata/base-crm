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

Route::prefix('attachment')->group(function () {
    Route::post('/upload-temp-file', 'AttachmentController@uploadTempFile')->name('attachment.upload_temp_file');
});
