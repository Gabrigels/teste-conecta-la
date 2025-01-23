<?php

use App\Http\Controllers\Api\UsuarioController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Exemplo de rota pública
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello, API!']);
});

Route::prefix("usuario")->group(function () {
    Route::get("/", [UsuarioController::class, 'listar']);
    Route::get("/{id}", [UsuarioController::class, 'recuperar']);
    Route::post("/", [UsuarioController::class, 'cadastrar']);
    Route::put("/{id}", [UsuarioController::class, 'editar']);
    Route::delete("/{id}", [UsuarioController::class, 'excluir']);
});
