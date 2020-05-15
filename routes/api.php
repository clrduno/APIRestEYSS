<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('categorias', 'Categoria\CategoriaController', ['except' =>['create','edit']]); //
Route::resource('categorias.productos', 'Categoria\CategoriaProductoController', ['only' =>['index']]);
Route::post('categoriasedit', 'Categoria\CategoriaController@categoriaseditajax');

//Route::resource('productos', 'Producto\ProductoController', ['only' =>['index','show']]);
//Route::resource('productos.categorias', 'Producto\ProductoCategoriaController', ['only' =>['index', 'update', 'destroy']]);