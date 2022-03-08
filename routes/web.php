<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    //Rutas asociadas al controlador resource CitaController
    //GET 	/eventos 	index 	eventos.index
    //GET 	/eventos/create 	create 	eventos.create
    //POST 	/eventos 	store 	eventos.store
    //GET 	/eventos/{cita} 	show 	eventos.show
    //GET 	/eventos/{cita}/edit 	edit 	eventos.edit
    //PUT/PATCH 	/eventos/{cita} 	update 	eventos.update
    //DELETE 	/eventos/{cita} 	destroy 	eventos.destroy
    Route::resource('eventos', EventoController::class);
});


require __DIR__ . '/auth.php';
