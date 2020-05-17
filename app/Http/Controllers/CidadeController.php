<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cidade;

class CidadeController extends Controller
{
    public function lista() {
        $cidades = DB::table('cidades')->simplePaginate(1);
        
        return view('cidade.lista',[
            'cidades' => $cidades
        ]);
    }

    public function cadastro() {
        return view('cidade.cadastro');
    }
}
