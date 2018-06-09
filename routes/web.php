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
    return redirect('app/transport');
});

Route::get('/transport', 'TransportController@index');

Route::resource('/car', 'CarController');
Route::resource('/bus', 'BusController');
Route::resource('/motorcycle', 'MotorcycleController');
Route::resource('/lorry', 'LorryController');
Route::resource('/workshop', 'WorkshopController');
Route::resource('/engineer', 'EngineerController');
Route::resource('/test-labs', 'TestLabsController');
Route::resource('/worker', 'WorkerController');
Route::resource('/brigade', 'BrigadeController');

Route::get('/car/{id}/test-labs', 'CarController@getTestLabs');
Route::get('/bus/{id}/test-labs', 'BusController@getTestLabs');
Route::get('/motorcycle/{id}/test-labs', 'MotorcycleController@getTestLabs');
Route::get('/lorry/{id}/test-labs', 'LorryController@getTestLabs');

Route::get('/transport/by-test-labs', 'TransportController@getTransportByTestLabs');

Route::get('/workshop/{id}/masters', 'EngineerController@getMastersList');
Route::get('/workshop/{id}/boss', 'EngineerController@getBossList');
