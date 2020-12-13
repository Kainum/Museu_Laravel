<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objeto;
use App\Http\Requests\ObjetoRequest;

class ObjetosController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $objetos = Objeto::orderBy('nome')->paginate(10);
        }
        else {
            $objetos = Objeto::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate(10)
                            ->setpath('objetos?desc_filtro='.$filtragem);
        }

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
        try {
            Objeto::find($id)->delete();
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
        $objeto = Objeto::find($id);
        return view('objetos.edit', compact('objeto'));
    }

    public function update(ObjetoRequest $request, $id) {
        Objeto::find($id)->update($request->all());
        return redirect()->route('objetos');
    }
}
