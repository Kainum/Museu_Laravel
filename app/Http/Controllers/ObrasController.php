<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Obra;
use App\Http\Requests\ObraRequest;

class ObrasController extends Controller
{
    
    public function index (Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
            $obras = Obra::orderBy('nome')->paginate(10);
        }
        else {
            $obras = Obra::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate(10)
                            ->setpath('obras?desc_filtro='.$filtragem);
        }

        return view('obras.index', ['obras' => $obras]);
    }

    //==========================================================

    public function create () {
        return view('obras.create');
    }

    public function store (ObraRequest $request) {
        $novo_obra = $request->all();
        Obra::create($novo_obra);

        return redirect()->route('obras');
    }

    //==========================================================

    public function destroy($id) {
        try {
            Obra::find($id)->delete();
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
        $obra = Obra::find(\Crypt::decrypt($request->get('id')));
        return view('obras.edit', compact('obra'));
    }

    public function update(ObraRequest $request, $id) {
        Obra::find($id)->update($request->all());
        return redirect()->route('obras');
    }
}
