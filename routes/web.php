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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/index', 'index');
Route::get('/publication', 'PublicationController@index'); //crear controlador
Route::get('/profile', 'ProfileController@index'); //lo mismo

Route::get('/faqs', 'FaqsController@index');

