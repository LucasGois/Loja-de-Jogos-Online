<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\CategoriasProdutos;
use App\Produto;
use Illuminate\Http\Request;

class CategoriasProdutoController extends Controller {

    public function lista($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        return view('categorias_produto.lista', [
            'produto' => $produto,
            'categorias' => $produto->categorias,
        ]);
    }

    public function cadastro($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $categorias = Categoria::all();

        return view('categorias_produto.cadastro', [
            'produto' => $produto,
            'categorias' => $categorias
        ]);
    }

    public function salvar(Request $req, $id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $categoriasProduto = new CategoriasProdutos();
        $categoriasProduto->id_produto = $id_produto;
        $categoriasProduto->id_categoria = $req->input('id_categoria');
        $categoriasProduto->save();

        return redirect()->route('categorias_produto_lista', $id_produto);
    }

    public function excluir($id_produto, $id_categoria){
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $categoriasProduto = new CategoriasProdutos();
        $categoriasProduto = $categoriasProduto->where('id_produto', '=', $id_produto);
        $categoriasProduto = $categoriasProduto->where('id_categoria', '=', $id_categoria)->first();
        $categoriasProduto->delete();

        return back();
    }

}