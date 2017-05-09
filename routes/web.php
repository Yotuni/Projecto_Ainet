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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@profile')->name('home');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('{id}/edit', 'UserController@edit')->name('edit');

Route::put('{id}/edit', 'UserController@update')->name('update');

Route::get('/printers', 'PrinterController@index');

Route::post('/printers', 'PrinterController@create');

Route::get('/departments', 'DepartmentController@index');

Route::post('/departments', 'DepartmentController@create');

Route::get('/requests', 'RequestController@create')->name('addRequest');

Route::get('/requests', 'RequestController@index')->name('listRequest');
