<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sala;
use App\Http\Requests\SalaRequest;

class SalasController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $salas = Sala::orderBy('sala')->paginate(10);
        }
        else {
            $salas = Sala::where('sala', 'like', '%'.$filtragem.'%')
                            ->orderBy('sala')
                            ->paginate(10)
                            ->setpath('salas?desc_filtro='.$filtragem);
        }

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
        try {
            Sala::find($id)->delete();
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
        $sala = Sala::find($id);
        return view('salas.edit', compact('sala'));
    }

    public function update(SalaRequest $request, $id) {
        Sala::find($id)->update($request->all());
        return redirect()->route('salas');
    }
}
