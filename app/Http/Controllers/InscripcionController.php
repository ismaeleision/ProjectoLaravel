<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\User;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //El admin puede verlas todas
        if (Auth::user()->rol == 'admin') {
            $inscripciones = Inscripcion::paginate(5);
        } else {
            //Sacar id de usuario autenticado
            $id = Auth::id();
            //Sacar las citas del usuario que se ha logueado
            $inscripciones = Inscripcion::where('user_id', $id)->paginate(5);
        }

        return view("inscripcion", ["inscripciones" => $inscripciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("createInscripcion", ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = Evento::find($request->evento);
        $entradas = $evento->nummaxentradas;

        //Validación
        $validated = $request->validate([
            'numentradas' => 'required|lt:$entradas|gt:0'
        ]);



        //Insercción
        $inscripcion = new Inscripcion;
        $inscripcion->user_id = Auth::user()->id;
        $inscripcion->evento_id = $request->evento;
        $inscripcion->numentradas = $request->numentradas;
        $inscripcion->estado = "En Proceso";
        $inscripcion->save();

        $evento = Evento::find($request->evento);
        $evento->nummaxentradas = $evento->nummaxentradas - $request->numentradas;
        $evento->save();

        return redirect()->route('inscripciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscripcion = Inscripcion::find($id);
        return view("editInscripcion", ['inscripcion' => $inscripcion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inscripcion = Inscripcion::find($id);
        $evento = Evento::find($inscripcion->evento->id);
        $entradas = $evento->nummaxentradas;

        //Validación
        $validated = $request->validate([
            'numentradas' => 'required|lt:10|gt:0'
        ]);

        //Insercción


        //Actualiza el total de entradas del evento
        $evento->nummaxentradas = $evento->nummaxentradas + ($inscripcion->numentradas - $request->numentradas);
        $evento->save();

        $inscripcion->numentradas = $request->numentradas;
        //Si el usuario es admin o el organizador del evento modifica el estado
        if (Auth::user()->rol == "admin" || $inscripcion->evento->user_id == Auth::user()->id)
            $inscripcion->estado = $request->estado;

        $inscripcion->save();

        return redirect()->route('inscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);

        //Actualizar las entradas de los eventos
        $evento = Evento::find($inscripcion->evento->id);
        $evento->nummaxentradas = intval($evento->nummaxentradas) + $inscripcion->numentradas;
        $evento->save();

        if ($inscripcion->user->id == Auth::id()) {

            Inscripcion::destroy($id);
        } else {
            abort(403);
        }
        return redirect()->route('inscripciones.index');
    }

    /**
     *  Crear inscripciones a través de la API 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createApi(Request $request)
    {
        //Validación
        $validated = $request->validate([
            'numentradas' => 'required|lt:10|gt:0'
        ]);

        //Insercción
        $inscripcion = new Inscripcion;
        $inscripcion->user_id = Auth::user()->id;
        $inscripcion->evento_id = $request->evento_id;
        $inscripcion->numentradas = $request->numentradas;
        $inscripcion->estado = "En Proceso";
        $inscripcion->save();

        return response()->json([
            'message' => 'Inscripcion creada correctamente'
        ]);
    }

    public function deleteApi($id)
    {
        $inscripcion = Inscripcion::find($id);
        $this->authorize('delete', $inscripcion);
        Inscripcion::destroy($id);

        return response()->json([
            'message' => 'Inscripcion eliminada correctamente'
        ]);
    }
}
