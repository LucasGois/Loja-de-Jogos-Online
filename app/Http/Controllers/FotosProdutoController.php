<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class FotosProdutoController extends Controller {
    
    public function lista($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) {
            return redirect()->route('produto_lista');
        }

        return view('fotos_produto.lista', [
            'produto' => $produto,
            'fotos' => $produto->fotos,
        ]);
    }

}