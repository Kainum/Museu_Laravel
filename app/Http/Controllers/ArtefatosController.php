<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artefato;
use App\Http\Requests\ArtefatoRequest;

class ArtefatosController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $artefatos = Artefato::orderBy('nome')->paginate(10);
        }
        else {
            $artefatos = Artefato::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate(10)
                            ->setpath('artefatos?desc_filtro='.$filtragem);
        }

        return view('artefatos.index', ['artefatos' => $artefatos]);
    }

    //==========================================================

    public function create () {
        return view('artefatos.create');
    }

    public function store (ArtefatoRequest $request) {
        $novo_artefato = $request->all();
        Artefato::create($novo_artefato);

        return redirect()->route('artefatos');
    }

    //==========================================================

    public function destroy($id) {
        try {
            Artefato::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    //==========================================================

    public function edit($id) {
        $artefato = Artefato::find($id);
        return view('artefatos.edit', compact('artefato'));
    }

    public function update(ArtefatoRequest $request, $id) {
        Artefato::find($id)->update($request->all());
        return redirect()->route('artefatos');
    }
}
