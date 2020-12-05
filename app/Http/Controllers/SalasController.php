<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sala;
use App\Http\Requests\SalaRequest;

class SalasController extends Controller
{
    
    public function index () {
        $salas = Sala::orderBy('sala')->paginate(5);
        return view('salas.index', ['salas' => $salas]);
    }

    //==========================================================

    public function create () {
        return view('salas.create');
    }

    public function store (SalaRequest $request) {
        $novo_sala = $request->all();
        Sala::create($novo_sala);

        return redirect()->route('salas');
    }

    //==========================================================

    public function destroy($id) {
        Sala::find($id)->delete();
        return redirect()->route('salas');
    }

    //==========================================================

    public function edit($id) {
        $sala = Sala::find($id);
        return view('salas.edit', compact('sala'));
    }

    public function update(SalaRequest $request, $id) {
        Sala::find($id)->update($request->all());
        return redirect()->route('salas');
    }
}
