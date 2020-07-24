<?php

use Illuminate\Support\Facades\Route;

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

/** Logowanie **/
Route::get('login', 'Auth\LoginController@showLoginForm')
     ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
     ->name('logout');
/** --------------------------------------------------------- **/

Route::get('/', function () {
   return redirect()->route('login');
});

Route::get('/weather', 'WeatherController@index')
     ->name('weather');

Route::get('/weather/add', 'WeatherController@create')
     ->name('add');

Route::get('/weather/edit', 'WeatherController@edit')
     ->name('edit');

Route::get('/weather/show/{id}', 'WeatherController@show')
     ->name('show_by_id');

Route::post('/weather/store', 'WeatherController@store')
     ->name('city-add');

Route::get('/weather/delete/{id}', 'WeatherController@destroy')
     ->name('delete-city');
