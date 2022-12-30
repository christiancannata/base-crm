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


    Route::get('agenda/user-unavailabilities', [\Modules\Calendar\Http\Controllers\AgendaController::class, 'getUserUnavailabilities'])->name('agenda.user_unavailabilities');
    Route::get('agenda/user-unavailabilities-day-time', [\Modules\Calendar\Http\Controllers\AgendaController::class, 'getUserUnavailabilitiesDayTime'])->name('agenda.user_unavailabilities_day_time');

    Route::get('agenda/{agenda}/confirm-delete', [\Modules\Calendar\Http\Controllers\AgendaController::class, 'confirmDelete'])->name('agenda.confirm_delete');
    Route::resource('agenda', AgendaController::class);
});

Route::prefix('calendar')->middleware(['auth'])->group(function () {
    Route::get('/all-events', 'CalendarController@getAllEvents')->name('calendar.all-events');
    Route::get('/latest-events-box', 'CalendarController@getLatestEventsBox')->name('calendar.latest-events-box');
});
