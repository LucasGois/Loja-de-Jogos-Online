<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller{

    public function lista(Request $req)
    {
        $produtos = new Produto();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $produtos = $produtos->orderBy($ordem, 'asc');
        $produtos = $produtos->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $produtos = $produtos->paginate($this->pag_size)->appends($vetor_parametros);

        return view('produto.lista', [
            'produtos' => $produtos,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function add_carrinho($id)
    {
        $variavel = [
            "produto" => $id
        ];
        session($variavel);
    }  
}
