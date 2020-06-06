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

     public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $produto = Produto::find($id);
        } else {
            // Adicionar
            $produto = new Produto();
        }

       // $cidades = Cidade::all();
        
        return view('produto.cadastro', [
            'produto' => $produto,
            //'cidades'=>$cidades
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3|unique:cidades,nome',
            'valor' => 'required|numeric',
            
        ]);

        if($id > 0){
            $produto = Produto::find($id);
        } else {
            $produto = new Produto();
        }

        $imagem = $req->file('upload');
        $nome = $req->input('nome');
    
        
        $produto->nome = $req->input('nome');
        $produto->descricao = $req->input('descricao');
        $produto->estoque = $req->input('estoque');
        $produto->valor = $req->input('valor');
        $produto->imagem = $nome;

        $produto->save();

        $slug = $produto->nome . " " . $produto->id;
        $slug = Str::of($slug)->slug('-');
        $slug = $slug . "." . $imagem->extension();

        $slug = $imagem->storeAs('imagens_produtos', $slug);

        $produto->imagem = "upload/$slug";
        if ($produto->save()){
            $msg = "Produto adicionado!";
        } else {
            $msg = "Produto não foi cadastrado. Tente novamente!!";
        }


        return redirect()->route('produto_lista');
    }


    public function excluir($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produto_lista');
    }

    public function add_carrinho($id)
    {
        $variavel = [
            "produto" => $id
        ];
        session($variavel);
    }  
}
