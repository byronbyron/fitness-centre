<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\RemindersController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/leads', 'LeadsController@index')->name('lead.index');

    Route::get('/leads/create', 'LeadsController@create');
    Route::post('/leads/save', 'LeadsController@store');

    Route::get('/leads/{lead}', 'LeadsController@view')->name('lead.view');
    Route::post('/leads', 'LeadsController@update')->name('lead.update');

    Route::get('/leads/{lead}/reminders/create', 'RemindersController@create')->name('reminder.create');
    Route::post('/reminders/create/save', 'RemindersController@store')->name('reminder.store');
    Route::get('/leads/{lead}/reminders/{reminder}', 'RemindersController@view')->name('reminder.view');
    Route::post('/leads/view/reminders/update', 'RemindersController@update')->name('reminder.update');
    Route::get('/leads/{lead}/reminders/{reminder}/note', 'RemindersController@addNote')->name('reminder.note');
    Route::post('/leads/view/reminders/clode', 'RemindersController@close')->name('reminder.close');
});

Auth::routes();
