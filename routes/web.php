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
Route::get('/grupos', 'GroupsController@index');    // Todos los grupos activos
Route::get('/grupos/create', 'GroupsController@create'); // Formulario de Crear Grupo
Route::post('/grupos/create', 'GroupsController@store')->name('groups.create'); // Guardar el grupo
Route::get('/grupos/show/{id}', 'GroupsController@show');    // Ver un grupo determinado
Route::get('/grupos/edit/{id}', 'GroupsController@edit');    // Ver un grupo determinad
Route::post('/grupos/edit/{id}', 'GroupsController@update');    // Guardo el grupo con edicion.


//Perfil Usuarios
Route::get('/perfil', 'ProfileController@index'); //Perfil propio
Route::get('/perfil/{id}', 'ProfileController@show'); //Perfil de id




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
