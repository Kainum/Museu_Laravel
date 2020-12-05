<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use App\Http\Requests\EventoRequest;

class EventosController extends Controller
{
    
    public function index () {
        $eventos = Evento::orderBy('nome_evento')->paginate(5);
        return view('eventos.index', ['eventos' => $eventos]);
    }

    //==========================================================

    public function create () {
        return view('eventos.create');
    }

    public function store (EventoRequest $request) {
        $novo_evento = $request->all();
        Evento::create($novo_evento);

        return redirect()->route('eventos');
    }

    //==========================================================

    public function destroy($id) {
        Evento::find($id)->delete();
        return redirect()->route('eventos');
    }

    //==========================================================

    public function edit($id) {
        $evento = Evento::find($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(EventoRequest $request, $id) {
        Evento::find($id)->update($request->all());
        return redirect()->route('eventos');
    }
}
