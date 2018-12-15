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


/* Aclaraciones de las rutas:

/           -> nos lleva a index. (Si estás deslogueado te da la opción de registrarte, si estás logueado te lleva a /inicio y te muestra las ultimas publicaciones de los grupos en los grupos que participas.)

/perfil/id  -> nos lleva a nuestro perfil.

/grupos     -> nos muestra todos los grupos que existen.



*/
Auth::routes();

// Vista Principal
// Si no estás logueado, te muestra el index, si estás logueado, te lleva a ver las ultimas actividades del grupo.
Route::view('/', 'index');

// Login
Route::get('/home', 'HomeController@index')->name('home');

// Preguntas Frecuentes
Route::view('/faqs', 'faqs');


//Grupos -- Lo podríamos hacer con grupo de rutas no ?
Route::get('/grupos', 'GroupsController@index')->middleware('auth');    // Todos los grupos activos
Route::get('/grupos/create', 'GroupsController@create')->middleware('auth'); // Formulario de Crear Grupo
Route::post('/grupos/create', 'GroupsController@store')->middleware('auth'); // Guardar el grupo
Route::get('/grupos/show/{id}', 'GroupsController@show')->middleware('auth');    // Ver un grupo determinado

Route::get('/grupos/edit/{id}', 'GroupsController@edit')->middleware('auth');    // Ver un grupo determinad
Route::post('/grupos/edit/{id}', 'GroupsController@update')->middleware('auth');    // Guardo el grupo con edicion.
Route::get('/grupos/delete/{id}', 'GroupsController@destroy')->middleware('auth'); //Desactivamos el grupo actual.

Route::get('/grupos/removeuser/{id}', 'GroupUserController@removeUser')->middleware('auth'); //echamos a un usuario del grupo.


Route::get('/grupos/request/{id}', 'GroupsController@requestGroup')->middleware('auth');

Route::get('/grupos/request/{id}/accept', 'RequestGroupController@acceptRequest')->middleware('auth');
Route::get('/grupos/request/{id}/reject', 'RequestGroupController@rejectRequest')->middleware('auth');

Route::get('/grupos/news', 'GroupsController@sendNews')->middleware('auth');

Route::post('/grupos/comment', 'GroupsController@sendComment')->middleware('auth');

//Perfil Usuarios
// Route::get('/perfil', 'ProfileController@show')->middleware('auth'); //Perfil propio
Route::get('/perfil/{id?}', 'ProfileController@show')->middleware('auth'); //Perfil de id
Route::get('/perfil/edit/{id}', 'ProfileController@edit')->middleware('auth'); //Perfil de id
