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
use App\Controllers\TicketController;

// Route::get('/', function () {
//     return view('tickets.index');
// });

Auth::routes();

Route::get('/', 'TicketController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::Resource('propietarios', 'PropietarioController');
Route::Resource('vehiculos', 'VehiculoController');
Route::Resource('tipo_vehiculos', 'Tipo_vehiculoController');
Route::Resource('tickets', 'TicketController');
