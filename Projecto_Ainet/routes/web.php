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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('printers', 'PrinterController');

Route::resource('departments', 'DepartmentController');

Route::resource('requests', 'RequestController');

Route::get('/profile/{id}', 'WelcomeController@profile')->name('profile');

Route::get('{id}/edit', 'UserController@edit')->name('edit');

Route::put('{id}/edit', 'UserController@update')->name('update');

Route::get('/details/{id}', 'RequestController@detail')->name('detail');

Route::get('/userRequests', 'RequestController@userRequests')->name('userRequests');

Route::get('/searchRequests', 'RequestController@searchRequests')->name('searchRequests');

Route::post('/refineSearch', 'RequestController@refineSearch')->name('refineSearch');

Route::get('/listusers', 'WelcomeController@listUsers')->name('listusers');

