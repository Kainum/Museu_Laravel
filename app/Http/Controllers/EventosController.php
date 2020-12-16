<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use App\EventoSala;
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

    public function store(Request $request) {
        $evento= Evento::create([
            'nome_evento'=>$request->get('nome_evento'),
            'dt_inicio'=>$request->get('dt_inicio'),
            'dt_fim'=>$request->get('dt_fim'),
            'dt_lmt_inscricao'=>$request->get('dt_lmt_inscricao'),
            'info'=>$request->get('info'),
        ]);

        $salas = $request->salas;
        foreach($salas as $s => $value) {
            EventoSala::create([
                'evento_id'=>$evento->id,
                'sala_id'=>$salas[$s],
            ]);
        }

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
