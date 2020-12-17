<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artista;
use App\Http\Requests\ArtistaRequest;

class ArtistasController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $artistas = Artista::orderBy('nome')->paginate(10);
        }
        else {
            $artistas = Artista::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate(10)
                            ->setpath('artistas?desc_filtro='.$filtragem);
        }

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

    public function destroy(Request $request) {
        try {
            Artista::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    //==========================================================

    public function edit(Request $request) {
        $artista = Artista::find(\Crypt::decrypt($request->get('id')));
        return view('artistas.edit', compact('artista'));
    }

    public function update(ArtistaRequest $request) {
        Artista::find(\Crypt::decrypt($request->get('id')))->update($request->all());
        return redirect()->route('artistas');
    }
}
