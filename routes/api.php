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
Route::put('{id}', ['App\Http\Controllers\ListaElementoController', 'update']);
Route::delete('{id}', ['App\Http\Controllers\ListaElementoController', 'destroy']);

Route::post('fichaActivoFijo/data', ['App\Http\Controllers\FichaActivoFijo','getData']);


Route::post('responsableacf/data', ['App\Http\Controllers\ResponsableActivoFijo','getData']);


}); 
