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

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::get('/drivers', 'App\Http\Controllers\DriversController@index');
Route::get('/drivers/tasks/dt', 'App\Http\Controllers\DriversController@dt');

Route::get('/supervisors', 'App\Http\Controllers\SupervisorsController@index');
Route::get('/supervisors/tasks/dt', 'App\Http\Controllers\SupervisorsController@dt');

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

Route::get('/admin/spbus', 'App\Http\Controllers\Admin\SpbuController@index');
Route::post('/admin/spbus/edit', 'App\Http\Controllers\Admin\SpbuController@spbus_edit');
Route::post('/admin/spbus/save', 'App\Http\Controllers\Admin\SpbuController@spbus_save');
Route::post('/admin/spbus/dt', 'App\Http\Controllers\Admin\SpbuController@spbus_dt');
Route::post('/admin/spbus/add', 'App\Http\Controllers\Admin\SpbuController@spbus_add');
Route::post('/admin/spbus/delete', 'App\Http\Controllers\Admin\SpbuController@spbus_delete');


Route::get('/admin/tasks', 'App\Http\Controllers\Admin\TaskController@index');
Route::post('/admin/tasks/detail', 'App\Http\Controllers\Admin\TaskController@tasks_detail');
Route::post('/admin/tasks/dt', 'App\Http\Controllers\Admin\TaskController@tasks_dt');
Route::post('/admin/tasks/add', 'App\Http\Controllers\Admin\TaskController@tasks_add');
Route::post('/admin/tasks/edit', 'App\Http\Controllers\Admin\TaskController@tasks_edit');
Route::post('/admin/tasks/save', 'App\Http\Controllers\Admin\TaskController@tasks_save');
Route::post('/admin/tasks/delete', 'App\Http\Controllers\Admin\TaskController@tasks_delete');