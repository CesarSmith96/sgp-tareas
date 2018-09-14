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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/headeradmin', function(){
	return view('plantillas.headeradmin');
});
Route::get('/paginaenblanco', function(){
	return view('plantillas.paginaenblanco');
});
Route::get('clientemostrar','ClienteController@getIndex');

Route::get('crear','ClienteController@getCrear');

Route::post('crear','ClienteController@postCrear');

Route::get('editar','ClienteController@getEditar');

Route::post('editar','ClienteController@postEditar');

Route::get('eliminar','ClienteController@getEliminar');

Route::get('prueba', function(){
	return "Hola";
});
