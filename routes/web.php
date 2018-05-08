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

Route::any('{all}', function() {
    return view('app');
})->where(['all' => 'app/.*']);

Route::get('/', function() {
    return view('title');
});

Route::get('/transport', 'TransportController@index');

Route::resource('/car', 'CarController');

Route::resource('/bus', 'BusController');

Route::resource('/motorcycle', 'MotorcycleController');

Route::resource('/lorry', 'LorryController');

Route::resource('/workshop', 'WorkshopController');

Route::resource('/engineer', 'EngineerController');
