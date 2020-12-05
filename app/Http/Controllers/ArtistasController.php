<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artista;
use App\Http\Requests\ArtistaRequest;

class ArtistasController extends Controller
{
    
    public function index () {
        $artistas = Artista::orderBy('nome')->paginate(5);
        return view('artistas.index', ['artistas' => $artistas]);
    }

    //==========================================================

    public function create () {
        return view('artistas.create');
    }

    public function store (ArtistaRequest $request) {
        $novo_artista = $request->all();
        Artista::create($novo_artista);

        return redirect()->route('artistas');
    }

    //==========================================================

    public function destroy($id) {
        Artista::find($id)->delete();
        return redirect()->route('artistas');
    }

    //==========================================================

    public function edit($id) {
        $artista = Artista::find($id);
        return view('artistas.edit', compact('artista'));
    }

    public function update(ArtistaRequest $request, $id) {
        Artista::find($id)->update($request->all());
        return redirect()->route('artistas');
    }
}
