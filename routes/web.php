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

Route::get('/admin/drivers', 'App\Http\Controllers\Admin\DriversController@index');
Route::post('/admin/drivers/edit', 'App\Http\Controllers\Admin\DriversController@drivers_edit');
Route::post('/admin/drivers/save', 'App\Http\Controllers\Admin\DriversController@drivers_save');
Route::post('/admin/drivers/dt', 'App\Http\Controllers\Admin\DriversController@drivers_dt');
Route::post('/admin/drivers/add', 'App\Http\Controllers\Admin\DriversController@drivers_add');
Route::post('/admin/drivers/delete', 'App\Http\Controllers\Admin\DriversController@drivers_delete');

Route::get('/admin/supervisors', 'App\Http\Controllers\Admin\SupervisorsController@index');
Route::post('/admin/supervisors/edit', 'App\Http\Controllers\Admin\SupervisorsController@supervisors_edit');
Route::post('/admin/supervisors/save', 'App\Http\Controllers\Admin\SupervisorsController@supervisors_save');
Route::post('/admin/supervisors/dt', 'App\Http\Controllers\Admin\SupervisorsController@supervisors_dt');
Route::post('/admin/supervisors/add', 'App\Http\Controllers\Admin\SupervisorsController@supervisors_add');
Route::post('/admin/supervisors/delete', 'App\Http\Controllers\Admin\SupervisorsController@supervisors_delete');