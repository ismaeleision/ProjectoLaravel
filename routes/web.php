<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscripcionController;

/*
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return redirect()->action([EventoController::class, 'index']);
});

Route::get('/eventos', [EventoController::class, 'index'])->name("eventos.index");
Route::get('/acerca', function () {
    return view("acercade");
})->name("acerca");


Route::middleware(['auth'])->group(function () {
    Route::get('/eventos/delete/{id}', [EventoController::class, 'destroy']);
    //Rutas asociadas al controlador resource servicioController
    //GET 	/eventos 	index 	eventos.index
    //GET 	/eventos/create 	create 	eventos.create
    //POST 	/eventos 	store 	eventos.store
    //GET 	/eventos/{servicio} 	show 	eventos.show
    //GET 	/eventos/{servicio}/edit 	edit 	eventos.edit
    //PUT/PATCH 	/eventos/{servicio} 	update 	eventos.update
    //DELETE 	/eventos/{servicio} 	destroy 	eventos.destroy
    Route::resource('eventos', EventoController::class);

    //Rutas para Inscripciones
    Route::get('/inscripciones', [InscripcionController::class, 'index'])->name("inscripciones.index");
    Route::get('/inscripciones/delete/{id}', [InscripcionController::class, 'destroy']);
    Route::get('/inscripciones/edit/{id}', [InscripcionController::class, 'edit']);
    Route::get('/inscripciones/create/{id}', [InscripcionController::class, 'create']);
    Route::put('/inscripciones/{id}', [InscripcionController::class, 'update']);
    Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
});

require __DIR__ . '/auth.php';
