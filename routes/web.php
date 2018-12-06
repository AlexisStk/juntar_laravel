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

//Grupos -- Lo podríamos hacer con grupo de rutas no ?
Route::get('/grupos', 'GroupsController@index')->middleware('auth');    // Todos los grupos activos
Route::get('/grupos/create', 'GroupsController@create')->middleware('auth'); // Formulario de Crear Grupo
Route::post('/grupos/create', 'GroupsController@store')->middleware('auth'); // Guardar el grupo
Route::get('/grupos/show/{id}', 'GroupsController@show')->middleware('auth');    // Ver un grupo determinado
Route::get('/grupos/edit/{id}', 'GroupsController@edit')->middleware('auth');    // Ver un grupo determinad
Route::post('/grupos/edit/{id}', 'GroupsController@update')->middleware('auth');    // Guardo el grupo con edicion.
Route::get('/grupos/delete/{id}', 'GroupsController@destroy')->middleware('auth'); //Desactivamos el grupo actual.


//Perfil Usuarios
Route::get('/perfil', 'ProfileController@index'); //Perfil propio
Route::get('/perfil/{id}', 'ProfileController@show'); //Perfil de id




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
