<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integracao;

class ConfiguracaoController extends Controller {

    public function cadastro() {
        return view('configuracao.configuracao', [
            'integracao' => Integracao::find(1)
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        if($id > 0){
            $integracao = Integracao::find($id);
        } else {
            $integracao = new Integracao();
        }

        if ($integracao == null) { return redirect()->route('home'); }

        $integracao->nome = $req->input('nome');
        $integracao->url = $req->input('url');
        $integracao->token = $req->input('token');

        $integracao->save();

        return redirect()->route('home');
    }

}