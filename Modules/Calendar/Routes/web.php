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

Route::prefix('calendar')->group(function () {
    Route::get('/all-events', 'CalendarController@getAllEvents')->name('calendar.all-events');
    Route::get('/latest-events-box', 'CalendarController@getLatestEventsBox')->name('calendar.latest-events-box');

});
