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

Route::get('/','PagesController@index');
Route::get('/home','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/create','EmployeesController@create');
Route::get('/show/{id}','EmployeesController@show');
Route::get('/edit/{id}','EmployeesController@edit');
Route::post('/store','EmployeesController@store');
Route::post('/update','EmployeesController@update');
Route::post('/delete','EmployeesController@destroy');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
