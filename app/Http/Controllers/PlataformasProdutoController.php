<?php

namespace App\Http\Controllers;

use App\Plataforma;
use App\PlataformaProduto;
use App\Produto;
use Illuminate\Http\Request;

class PlataformasProdutoController extends Controller {

    public function lista($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        return view('plataformas_produto.lista', [
            'produto' => $produto,
            'plataformas' => $produto->plataformas,
        ]);
    }

    public function cadastro($id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $plataformas = Plataforma::all();

        return view('plataformas_produto.cadastro', [
            'produto' => $produto,
            'plataformas' => $plataformas
        ]);
    }

    public function salvar(Request $req, $id_produto) {
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $plataformasProduto = new PlataformaProduto();
        $plataformasProduto->id_produto = $id_produto;
        $plataformasProduto->id_plataforma = $req->input('id_plataforma');
        $plataformasProduto->save();

        return redirect()->route('plataformas_produto_lista', $id_produto);
    }

    public function excluir($id_produto, $id_plataforma){
        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $plataformasProduto = new PlataformaProduto();
        $plataformasProduto = $plataformasProduto->where('id_produto', '=', $id_produto);
        $plataformasProduto = $plataformasProduto->where('id_plataforma', '=', $id_plataforma)->first();
        $plataformasProduto->delete();

        return back();
    }

}