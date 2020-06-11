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
//Rutes pagament
Route::get('/','PagamentsController@getPagaments');
Route::get('/pagament/{id}','PagamentsController@getPagament')->name("pagament");

//Rutes gestio categorias
Route::get('/categoria', 'CategoriasController@index')->name("categoria.index");
Route::get('/categoria/create', 'CategoriasController@create')->name("categoria.create");
Route::post('/categoria/create', 'CategoriasController@store')->name("categoria.store");
Route::get('/categoria/edit/{id}', 'CategoriasController@edit')->name("categoria.edit");
Route::post('/categoria/edit/{id}', 'CategoriasController@update')->name("categoria.update");
Route::delete('/categoria/delete/{id}', 'CategoriasController@destroy')->name("categoria.delete");

//Rutes gestio cursos
Route::get('/curs', 'CursosController@index')->name("curs.index");
Route::get('/curs/create', 'CursosController@create')->name("curs.create");
Route::post('/curs/create', 'CursosController@store')->name("curs.store");
Route::get('/curs/edit/{id}', 'CursosController@edit')->name("curs.edit");
Route::post('/curs/edit/{id}', 'CursosController@update')->name("curs.update");
Route::delete('/curs/delete/{id}', 'CursosController@destroy')->name("curs.delete");

//Rutes gestio pagaments
Route::get('/gestiopagament', 'PagamentsController@index')->name("pagament.index");
Route::get('/gestiopagament/create', 'PagamentsController@create')->name("pagament.create");
Route::post('/gestiopagament/create', 'PagamentsController@store')->name("pagament.store");
Route::get('/gestiopagament/edit/{id}', 'PagamentsController@edit')->name("pagament.edit");
Route::post('/gestiopagament/edit/{id}', 'PagamentsController@update')->name("pagament.update");
Route::delete('/gestiopagament/delete/{id}', 'PagamentsController@destroy')->name("pagament.delete");

//Rutes gesto usuaris

Route::get('/user', 'UsersController@index')->name("user.index");
Route::get('/user/create', 'UsersController@create')->name("user.create");
Route::post('/user/create', 'UsersController@store')->name("user.store");
Route::get('/user/edit/{id}', 'UsersController@edit')->name("user.edit");
Route::post('/user/edit/{id}', 'UsersController@update')->name("user.update");
Route::delete('/user/delete/{id}', 'UsersController@destroy')->name("user.delete");

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login','Auth\LoginController@inici');

Route::post('/login','Auth\LoginController@login')->name("login");