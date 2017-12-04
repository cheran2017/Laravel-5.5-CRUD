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



Route::get('/', 'CustomerController@index');
Route::post('customers', 'CustomerController@store');
Route::get('customers/{id}','CustomerController@show');
Route::post('customers-update', 'CustomerController@update');
Route::get('customers-delete/{id}', 'CustomerController@delete');

Route::resource('tests', 'TestController');

