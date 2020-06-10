<?php

namespace App\Http\Controllers;

use App\FotoProduto;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FotosProdutoController extends Controller {
    
    public function lista($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        return view('fotos_produto.lista', [
            'produto' => $produto,
            'fotos' => $produto->fotos,
        ]);
    }

    public function cadastro($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $fotos = FotoProduto::all();

        return view('fotos_produto.cadastro', [
            'produto' => $produto,
            'fotos' => $fotos
        ]);
    }

    public function salvar(Request $req, $id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        if (count($produto->fotos) >= 5) { return redirect()->route('fotos_produto_lista', $id_produto); }

        $nome_arquivo = $produto->id . " " . $produto->id . " " . $produto->nome;

        $fotosProduto = new FotoProduto();
        $fotosProduto->id_produto = $id_produto;
        $fotosProduto->nome = "storage/$nome_arquivo";
        $fotosProduto->save();

        // Imagem
        $imagem = $req->file('upload');
        
    	$nome_arquivo = $produto->id . " " . $fotosProduto->id . " " . $produto->nome;
    	$nome_arquivo = Str::of($nome_arquivo)->slug('-');
    	$nome_arquivo = $nome_arquivo . "." . $imagem->extension();
    	$nome_arquivo = $imagem->storeAs('imagens_produtos', $nome_arquivo);
        $fotosProduto->nome = "storage/$nome_arquivo";
        $fotosProduto->save();

        return redirect()->route('fotos_produto_lista', $id_produto);
    }

    public function excluir($id_produto, $id_foto){
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        FotoProduto::find($id_foto)->delete();

        return back();
    }

}