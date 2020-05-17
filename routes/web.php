<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadsController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/leads', 'LeadsController@index');
    Route::post('/leads', 'LeadsController@store');
    Route::get('/leads/create', 'LeadsController@create');
    Route::get('/leads/{lead}', 'LeadsController@show');
});

Auth::routes();
