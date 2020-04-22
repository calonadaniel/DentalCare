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


Route::get('/', function () {
    return view('index');
}); */
Route::get('/','ExpedienteController@index')->name('home');

Route::get('pagos-{id_expediente}','HistorialpagosController@index')->name('historialpagos.index');
Route::get('pdf-{id_expediente}','HistorialpagosController@pdf')->name('historialpagos.pdf');
Route::put('pagos-edit','HistorialpagosController@update')->name('historialpagos.update');
Route::delete('pagos-delete','HistorialpagosController@destroy')->name('historialpagos.destroy');
Route::post('pagos-add','HistorialpagosController@store')->name('historialpagos.store');

Route::Resource('expediente','ExpedienteController');
Route::Resource('resumenclinico','ResumenclinicoController');
Route::Resource('pagos','PagosController');

Route::get('resumenclinico-{id_expediente}','HistorialresumenclinicoController@index')->name('historialresumenclinico.index');
Route::put('resumenclinico-edit','HistorialresumenclinicoController@update')->name('historialresumenclinico.update');
Route::delete('resumenclinico-delete','HistorialresumenclinicoController@destroy')->name('historialresumenclinico.destroy');
Route::post('resumenclinico-add','HistorialresumenclinicoController@store')->name('historialresumenclinico.store');

Route::get('fotos-{id_expediente}','FotosController@index')->name('fotos.index');
Route::post('fotos-delete','FotosController@destroy')->name('fotos.destroy');
Route::post('fotos-add','FotosController@store')->name('fotos.store');

//Auth::routes(['register' => false]);
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
