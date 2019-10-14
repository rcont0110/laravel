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

/*Route::get('/index', function () {
    return view('listaUsuarios');
});*/

Route::get('/lista', 'UsuarioController@index');

Route::get('/borra/{id}', 'UsuarioController@destroy');

Route::post('/add', 'UsuarioController@store');

Route::post('/edit', 'UsuarioController@update');

?>