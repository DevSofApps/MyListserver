<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemListaController;
use App\Http\Controllers\ListaController;
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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/listas', [ListaController::class, 'index']);
    Route::get('/listas/{id}', [ListaController::class, 'show']);
    Route::post('/lista', [ListaController::class, 'store']);

    Route::post('/item', [ItemListaController::class, 'store']);
    Route::get('/{id}/itens', [ItemListaController::class, 'index']);
    Route::get('/{listaId}/{id}/item', [ItemListaController::class, 'show']);
    Route::put('/itens', [ItemListaController::class, 'update']);
});
