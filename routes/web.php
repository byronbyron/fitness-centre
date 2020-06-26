<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadsController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/leads', 'LeadsController@index')->name('lead.index');

    Route::get('/leads/create', 'LeadsController@create');
    Route::post('/leads/save', 'LeadsController@store');

    Route::get('/leads/{lead}', 'LeadsController@show')->name('lead.show');
    Route::post('/leads', 'LeadsController@update')->name('lead.update');
});

Auth::routes();
