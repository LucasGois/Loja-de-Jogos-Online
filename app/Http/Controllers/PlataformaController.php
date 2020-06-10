<?php

namespace App\Http\Controllers;

use App\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlataformaController extends Controller {

    public function lista(Request $req) {
        $plataformas = new Plataforma();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $plataformas = $plataformas->orderBy($ordem, 'asc');
        $plataformas = $plataformas->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $plataformas = $plataformas->paginate($this->pag_size)->appends($vetor_parametros);

        return view('plataforma.lista', [
            'plataformas' => $plataformas,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $plataforma = Plataforma::find($id);
        } else {
            // Adicionar
            $plataforma = new Plataforma();
        }

        return view('plataforma.cadastro', [
            'plataforma' => $plataforma
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3'
        ]);

        if($id > 0){
            $plataforma = Plataforma::find($id);
        } else {
            $plataforma = new Plataforma();
        }

        $plataforma->nome = $req->input('nome');
        $plataforma->save();

        return redirect()->route('plataforma_lista');
    }

    public function excluir($id){
        $plataforma = Plataforma::find($id);
        $plataforma->delete();
        return redirect()->route('plataforma_lista');
    }

}