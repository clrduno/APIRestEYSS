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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'GeneralController@index');
Route::get('/categorias', 'GeneralController@categorias');
Route::get('/productos', 'GeneralController@productos');
Route::get('/contacto', 'GeneralController@contacto');