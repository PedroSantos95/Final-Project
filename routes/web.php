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

Route::get('/', 'TempoIntermedioController@semCarroRef')->name('temposSemReferencia');

Route::get('/news', 'MessageController@showMensagens')->name('noticias');

Route::get('/teste', 'TempoIntermedioController@teste')->name('teste');

Route::get('/admin', 'MessageController@index')->name('adminBoard');

Route::get('/admin/{id}/alterarEstado', 'MessageController@alterarEstadoMensagem')->name('alterarEstadoMensagem');

Route::get('/admin/{id}/eliminarMensagem', 'MessageController@eliminarMensagem')->name('eliminarMensagem');

Route::get('/admin/{id}/editarMensagem', 'MessageController@editarMensagem')->name('editarMensagem');

Route::post('/admin/{id}/guardarMensagem', 'MessageController@guardarMensagem')->name('guardarMensagem');

Route::post('/admin', 'MessageController@create');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reload', function (){return redirect()->route('adminBoard', ['saved']);})->name('reload');