<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

/*
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/acerca', function () {
    return view("acercade");
})->name("acerca");


Route::middleware(['auth'])->group(function () {
    //Rutas asociadas al controlador resource servicioController
    //GET 	/eventos 	index 	eventos.index
    //GET 	/eventos/create 	create 	eventos.create
    //POST 	/eventos 	store 	eventos.store
    //GET 	/eventos/{servicio} 	show 	eventos.show
    //GET 	/eventos/{servicio}/edit 	edit 	eventos.edit
    //PUT/PATCH 	/eventos/{servicio} 	update 	eventos.update
    //DELETE 	/eventos/{servicio} 	destroy 	eventos.destroy
    Route::resource('eventos', EventoController::class);
});

require __DIR__ . '/auth.php';
