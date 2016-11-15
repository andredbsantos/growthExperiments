<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Home
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Auth::routes();

// Experiments
Route::get('/experiments', 'ExperimentController@index')->name('experiments');
Route::get('/experiments/archived', 'ExperimentController@archived')->name('experiments.archived');
Route::get('/experiments/add', 'ExperimentController@create');
Route::post('/experiments/add', 'ExperimentController@store');
Route::get('/experiments/edit/{id}', 'ExperimentController@edit')->name('experiments.edit');
Route::post('/experiments/edit/{id}', 'ExperimentController@update')->name('experiments.update');
Route::get('/experiments/delete/{id}', 'ExperimentController@destroy');
Route::get('/experiments/archive/{id}', 'ExperimentController@archive');
Route::get('/experiments/unarchive/{id}', 'ExperimentController@unarchive');
