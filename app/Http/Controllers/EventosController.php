<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use App\Http\Requests\EventoRequest;

class EventosController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $eventos = Evento::orderBy('nome_evento')->paginate(10);
        }
        else {
            $eventos = Evento::where('nome_evento', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome_evento')
                            ->paginate(10)
                            ->setpath('eventos?desc_filtro='.$filtragem);
        }

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
        try {
            Evento::find($id)->delete();
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
        $evento = Evento::find($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(EventoRequest $request, $id) {
        Evento::find($id)->update($request->all());
        return redirect()->route('eventos');
    }
}
