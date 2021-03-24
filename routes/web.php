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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login_eval', 'App\Http\Controllers\UserController@index');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/drivers', 'App\Http\Controllers\DriversController@index');

Route::get('/supervisors', 'App\Http\Controllers\SupervisorsController@index');

