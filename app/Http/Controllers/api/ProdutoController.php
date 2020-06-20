<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller {

    public function index() {
        return Produto::select(['id', 'nome', 'descricao', 'valor'])
            ->get();
    }

    public function store(Request $request) {
        $dados = json_decode($request->getContent(), 1);

        $produto = new Produto();
        $produto->nome = $dados['nome'];
        $produto->descricao = $dados['descricao'];
        $produto->estoque = 0;
        $produto->valor = $dados['valor'];
        $produto->slug = '';

        $produto->save();

        return Produto::select(['id', 'nome', 'descricao', 'valor'])
            ->findOrFail($produto->id);
    }

    public function show($id) {
        return Produto::select(['id', 'nome', 'descricao', 'valor'])
            ->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $dados = json_decode($request->getContent(), 1);

        $produto = Produto::findOrFail($id);
        $produto->nome = $dados['nome'];
        $produto->descricao = $dados['descricao'];
        $produto->estoque = 0;
        $produto->valor = $dados['valor'];
        $produto->slug = '';
        $produto->save();

        return Produto::select(['id', 'nome', 'descricao', 'valor'])
            ->findOrFail($produto->id);
    }

    public function destroy($id) {
        $produto = Produto::findOrFail($id);
        $produto->delete();
    }

}