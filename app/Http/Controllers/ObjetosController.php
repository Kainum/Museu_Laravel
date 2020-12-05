<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objeto;
use App\Http\Requests\ObjetoRequest;

class ObjetosController extends Controller
{
    
    public function index () {
        $objetos = Objeto::orderBy('nome')->paginate(5);
        return view('objetos.index', ['objetos' => $objetos]);
    }

    //==========================================================

    public function create () {
        return view('objetos.create');
    }

    public function store (ObjetoRequest $request) {
        $novo_objeto = $request->all();
        Objeto::create($novo_objeto);

        return redirect()->route('objetos');
    }

    //==========================================================

    public function destroy($id) {
        Objeto::find($id)->delete();
        return redirect()->route('objetos');
    }

    //==========================================================

    public function edit($id) {
        $objeto = Objeto::find($id);
        return view('objetos.edit', compact('objeto'));
    }

    public function update(ObjetoRequest $request, $id) {
        Objeto::find($id)->update($request->all());
        return redirect()->route('objetos');
    }
}
