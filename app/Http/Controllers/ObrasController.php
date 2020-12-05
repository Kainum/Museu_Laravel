<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObrasController extends Controller
{
    public function index() {
        $nome = "Obra TOP";
        return view('obras', ['nome'=>$nome]);
    }
}
