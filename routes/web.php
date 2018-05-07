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
    return view('welcome');
});

Route::get('/news', 'MessageController@showMensagens');

Route::get('/admin', 'MessageController@index')->name('adminBoard');

Route::get('/admin/{id}/alterarEstado', 'MessageController@alterarEstadoMensagem')->name('alterarEstadoMensagem');

Route::get('/admin/{id}/eliminarMensagem', 'MessageController@eliminarMensagem')->name('eliminarMensagem');

Route::post('/admin', 'MessageController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
