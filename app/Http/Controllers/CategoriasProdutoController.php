<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class CategoriasProdutoController extends Controller {

    public function lista($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) {
            return redirect()->route('produto_lista');
        }

        return view('categorias_produto.lista', [
            'produto' => $produto,
            'categorias' => $produto->categorias,
        ]);
    }

    public function excluir($id_produto, $id_categoria){
        $produto = Produto::find($id_produto)->pivot;

        return dd($produto);

        return redirect()->route('categoria_lista');
    }

}