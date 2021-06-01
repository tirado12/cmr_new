<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuenteClienteController;
use App\Http\Controllers\GastosIndirectosFuentesController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ObraModalidadEjecucionController;
use App\Http\Controllers\ProdimFuentesController;
use App\Http\Controllers\UserController;
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

Route::get('getUsuario/{user},{password},{id_OneSignal}', [ClienteController::class, 'getUsuario']);

Route::get('getCliente/{id}', [ClienteController::class, 'getCliente']);

Route::get('addOneSignal/{id},{id_OneSignal}', [ClienteController::class, 'addOneSignal']);

Route::get('getUsuarioToken/{token}', [ClienteController::class, 'getUsuarioToken']);

Route::get('getMunicipio/{id}', [MunicipioController::class, 'getMunicipio']);

Route::get('getFuentesCliente/{municipio},{anio}', [FuenteClienteController::class, 'getFuentesCliente']);

Route::get('getObrasCliente/{municipio},{anio}', [ObraController::class, 'getObrasCliente']);

Route::get('getProdim/{municipio},{anio}', [ObraController::class, 'getProdim']);

Route::get('getDesgloseProdim/{municipio},{anio}', [ProdimFuentesController::class, 'getDesgloseProdim']);

Route::get('getDesgloseGI/{municipio},{anio}', [GastosIndirectosFuentesController::class, 'getDesgloseGI']);


Route::get('getObraExpediente/{obra}',[ObraModalidadEjecucionController::class, 'getObraExpediente']);
Route::get('sendMessage/{mensaje},{id}', [ObraController::class, 'sendMessage']);