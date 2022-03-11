<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Models\Evento;
use App\Models\Inscripcion;
use App\Http\Resources\EventoResource;
use App\Http\Resources\InscripcionResource;



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

Route::middleware('auth:sanctum')->group(function () {

    //Get all Eventos
    Route::get('/eventos', function () {
        return EventoResource::collection(Evento::all());
    });

    //Get Evento por id
    Route::get('/eventos/{id}', function ($id) {
        return new EventoResource(Evento::findOrFail($id));
    });

    //Crear Inscripcion
    Route::post('/inscripcion', [InscripcionController::class, 'createApi']);

    //Borrar Inscripcion
    Route::delete('/inscripcion/{id}', [InscripcionController::class, 'deleteApi']);
});

//Estas rutas van fuera de auth:sanctum por que son las que generan el token, aún no lo tenemos
Route::post('/registro', [AuthApiController::class, 'registro']);
Route::post('/login', [AuthApiController::class, 'login']);
