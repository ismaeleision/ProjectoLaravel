<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\Categoria;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $eventos = Evento::where('user_id', $id)->paginate(8);
        $categorias = Categoria::all();
        return view('evento', ['eventos' => $eventos, 'categorias' => $categorias]);
        return view("evento");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("createEvento", ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insercción
        $evento = new Evento;
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->aforomax = $request->aforomax;
        $evento->tipo = $request->tipo;
        $evento->imagen = "";
        $evento->nummaxentradas = $request->nummaxentradas;
        $evento->categoria_id = $request->categoria;
        $evento->user_id = Auth::id();
        $evento->save();

        //$path = $request->file('imagen')->store('public');
        $path = $request->file('imagen')->storeAs(
            'public',
            $evento->id . '.jpg'
        );
        $evento->imagen = asset('imagenes/' . $evento->id . '.jpg');
        $evento->save();

        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('detalleEvento', ['evento' => $evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "editando";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        if ($evento->user->id == Auth::id()) {
            Evento::destroy($id);
        } else {
            abort(403);
        }
        return redirect()->route('eventos.index');
    }
}
