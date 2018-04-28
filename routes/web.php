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

Route::get('/', function () {
    return view('title');
});

Route::get('/app', function () {
   return view('app');
});

Route::get('/app/transport', function () {
    return view('app');
});

Route::get('/car/add', function () {
    return view('app');
});

Route::get('/bus/add', function () {
    return view('app');
});

Route::get('/car/edit', function () {
    return view('app');
});

Route::get('/workshop/add', function () {
    return view('app');
});

Route::get('/workshop/edit', function () {
    return view('app');
});

Route::get('/motorcycle/add', function () {
    return view('app');
});

Route::get('/motorcycle/edit', function () {
    return view('app');
});

Route::get('car/edit/5', function () {
    return view('app');
});

Route::get('app/staff', function () {
    return view('app');
});

Route::resource('/car', 'CarController');
Route::resource('/bus', 'BusController');
Route::resource('/motorcycle', 'MotorcycleController');
Route::resource('/lorry', 'LorryController');
Route::resource('/workshop', 'WorkshopController');
