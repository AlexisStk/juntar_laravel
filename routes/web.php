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

// Vista Principal
Route::view('/', 'index');

// Login
Route::get('/home', 'HomeController@index')->name('home');

// Preguntas Frecuentes
Route::view('/faqs', 'faqs');

//Inicio Se muestra las publicaciones de los grupos que estas
Route::get('/inicio', 'InitController@index');

//Grupos
Route::get('/grupos', 'GroupsController@index');
//Perfil con datos personales que se puedan editar
Route::get('/perfil', 'ProfileController@index');



