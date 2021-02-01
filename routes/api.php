<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'cors'], function(){
    //aqui van todas las rutas que necesitan CORS

Route::get('', ['App\Http\Controllers\ListaElementoController','index']);
Route::post('data/{id}', ['App\Http\Controllers\ListaElementoController','getData']);
Route::get('elemento/{id}', ['App\Http\Controllers\ListaElementoController','show']);
Route::get('create', ['App\Http\Controllers\ListaElementoController', 'create']);
Route::post('listaElemento', ['App\Http\Controllers\ListaElementoController', 'store']);
Route::put('listaElemento/{id}', ['App\Http\Controllers\ListaElementoController', 'update']);
Route::delete('{id}', ['App\Http\Controllers\ListaElementoController', 'destroy']);

Route::post('fichaActivoFijo/data', ['App\Http\Controllers\FichaActivoFijo','getData']);


Route::post('responsableacf/data', ['App\Http\Controllers\ResponsableActivoFijo','getData']);
Route::post('buscarTercero/', ['App\Http\Controllers\ResponsableActivoFijo','buscarTercero']);
Route::get('listas', ['App\Http\Controllers\ResponsableActivoFijo','tiposDocumentos']);
Route::post('guardarResponsableActivoFijo', ['App\Http\Controllers\ResponsableActivoFijo','guardarResponsableActivoFijo']);
Route::delete('responsableAcf/{id}', ['App\Http\Controllers\ResponsableActivoFijo','destroy']);


Route::post('categoria/data', ['App\Http\Controllers\CategoriaController','getData']);
Route::post('categoria/{id?}', ['App\Http\Controllers\CategoriaController','store']);
Route::delete('categoria/{id}', ['App\Http\Controllers\CategoriaController', 'destroy']);
Route::get('categoria/{id}', ['App\Http\Controllers\CategoriaController','show']);
Route::put('categoria/{id}', ['App\Http\Controllers\CategoriaController', 'update']);



Route::post('activofijo/data', ['App\Http\Controllers\productoAcfController','getData']);
Route::post('activofijo/{id?}', ['App\Http\Controllers\productoAcfController','store']);
Route::get('activofijo', ['App\Http\Controllers\productoAcfController', 'create']);
Route::get('activofijo/{id}', ['App\Http\Controllers\productoAcfController','show']);
Route::delete('activofijo/{id}', ['App\Http\Controllers\productoAcfController', 'destroy']);
Route::put('activofijo/{id}', ['App\Http\Controllers\productoAcfController', 'update']);



Route::post('activo_fijo/data', ['App\Http\Controllers\FichaActivoFijo','getData']);

}); 
