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
Route::group(['prefix' => 'grupos', 'middleware' => 'auth'],function() {
Route::get('/', 'GroupsController@index');    // Todos los  activos
Route::get('/create', 'GroupsController@create'); // Formulario de Crear Grupo
Route::post('/create', 'GroupsController@store'); // Guardar el grupo
Route::get('/show/{id}', 'GroupsController@show');    // Ver un grupo determinado

Route::get('/edit/{id}', 'GroupsController@edit');    // Ver un grupo determinad
Route::post('/edit/{id}', 'GroupsController@update');    // Guardo el grupo con edicion.
Route::get('/delete/{id}', 'GroupsController@destroy'); //Desactivamos el grupo actual.

Route::get('/removeuser/{id}', 'GroupUserController@removeUser'); //echamos a un usuario del grupo.


Route::get('/request/{id}', 'GroupsController@requestGroup');

Route::get('/request/{id}/accept', 'RequestGroupController@acceptRequest');
Route::get('/request/{id}/reject', 'RequestGroupController@rejectRequest');

Route::get('/news', 'GroupsController@sendNews');

Route::post('/comment', 'GroupsController@sendComment');
});

//Perfil Usuarios
// Route::get('/perfil', 'ProfileController@show')->middleware('auth'); //Perfil propio
Route::get('/perfil/{id?}', 'ProfileController@show')->middleware('auth'); //Perfil de id
Route::get('/perfil/edit/{id}', 'ProfileController@edit')->middleware('auth'); //Perfil de id
