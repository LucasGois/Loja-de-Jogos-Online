<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Produto;
use App\FotoProduto;
use App\Http\Controllers\AppController;

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
            'busca' => $busca,
            'admin' => AppController::ehAdmin()
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
        
        return view('produto.cadastro', [
            'produto' => $produto,
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3|unique:cidades,nome',
            'valor' => 'required|numeric',
            
        ]);

        if($id > 0){
            $produto = Produto::find($id);
            $fotoProduto = new FotoProduto();
        } else {
            $produto = new Produto();
            $fotoProduto = new FotoProduto();
        }

        // Produto
        $produto->nome = $req->input('nome');
        $produto->descricao = $req->input('descricao');
        $produto->estoque = $req->input('estoque');
        $produto->valor = $req->input('valor');

        $slug = $produto->nome . " " . $produto->id;
        $slug = Str::slug($slug, '-');
        // $slug = $slug . "." . $imagem->extension();
        $produto->slug = $slug;

        if ($produto->save()){
            $msg = "Produto adicionado!";
        } else {
            $msg = "Produto não foi cadastrado. Tente novamente!!";
        }

        // Imagem
        $imagem = $req->file('upload');
    	$nome_arquivo = $produto->nome . " " . $produto->id;
    	$nome_arquivo = Str::of($nome_arquivo)->slug('-');
    	$nome_arquivo = $nome_arquivo . "." . $imagem->extension();
    	$nome_arquivo = $imagem->storeAs('imagens_produtos', $nome_arquivo);

        // FotoProduto
        $fotoProduto->id_produto = $produto->id;
        $fotoProduto->nome = "storage/$nome_arquivo";
        $fotoProduto->save();

        return redirect()->route('produto_lista');
    }

    public function excluir($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produto_lista');
    }
}