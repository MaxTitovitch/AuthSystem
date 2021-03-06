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

Route::get('/', "WelcomeController@index")->name('welcome');
Route::post('/', "WelcomeController@save")->name('create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/overview/{id}', 'HomeController@overview')->name('overview');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::post('/update/{id}', 'HomeController@update')->name('update');

Route::get('/editing/{id}', 'EditingController@index')->name('editing');
