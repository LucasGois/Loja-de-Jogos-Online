<?php

namespace App\Http\Controllers;

use Auth;
use App\Cliente;
use App\Integracao;
use App\Produto;
use App\ProdutoVenda;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VendaController extends Controller
{

    /**
     * Adicionar no carrinho
     */
    public function adicionar($id_produto)
    {
        $produtos = session()->get('produtos', []);
        
        foreach ($produtos as $key => $produto) {
            if($produto->id == $id_produto){
                return redirect()->route('venda_lista');
            }
        }

        $produto = Produto::find($id_produto);

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $produtos[] = $produto;

        session()->put('produtos', $produtos);

        return redirect()->route('venda_lista');
    }

    /**
     * Remover do carrinho
     */
    public function remover($id_produto)
    {
        $produtos = session()->get('produtos', []);

        foreach ($produtos as $key => $produto) {
            if($produto->id == $id_produto){
                unset($produtos[$key]);
                break;
            }
        }

        session()->put('produtos', $produtos);

        return back()->withInput();
    }

    /**
     * Limpar carrinho
     */
    public function limpar() {
        session()->put('produtos', []);
        return redirect()->route('venda_lista');
    }

    /**
     * Listar
     */
    public function lista(Request $req)
    {
        $produtos = session()->get('produtos', []);
        
        $cliente = (new Cliente())->where('id_user', Auth::user()->id)->first();
        $enderecos = $cliente->enderecos;

        $total = 0.0;

        foreach ($produtos as $key => $produto) {
            $total += $produto->valor;
        }

        return view('venda.produto.lista', [
            'produtos' => $produtos,
            'enderecos' => $enderecos,
            'total' => $total,
            'admin' => AppController::ehAdmin(),
        ]);
    }

    /**
     * Salvar
     */
    public function salvar(Request $req, $id = 0) {

        if($id > 0){
            $venda = Venda::find($id);
        } else {
            $venda = new Venda();
        }

        if ($venda == null) { return redirect()->route('venda_lista'); }

        $cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first());
        $id_endereco = $req->input('id_endereco') ?? 0;

        if($id_endereco === 0){
            return redirect()->route('endereco_lista');
        }

        $produtos = session()->get('produtos');

        DB::beginTransaction();

        $venda->id_cliente = $cliente->id;
        $venda->id_endereco = $id_endereco;
        $venda->total = $req->input('total');
        $venda->save();

        foreach($produtos as $produto){
            $produtosVenda = new ProdutoVenda();
            $produtosVenda->quantidade = 1;
            $produtosVenda->subtotal = $produto->valor;
            $produtosVenda->id_venda = $venda->id;
            $produtosVenda->id_produto = $produto->id;
            $produtosVenda->save();
        }

        $email = $cliente->cpf.'@gmail.com';

        $integracao = Integracao::find(1);
        $response = Http::post($integracao->url, [
            'token' => $integracao->token,
            'cpf' => preg_replace("/[^0-9]/", "", $cliente->cpf),
            'valor' => $venda->total,
            'cliente' => Auth::user()->name,
            'senha' => $cliente->cpf,
            'email' => $email
        ]);

        if ($response->successful()) {
            DB::commit();
            $this->limpar();
            $venda->status_pagamento = 'PAGO';
            $venda->save();
            return redirect()->route('historico_lista');

        } else {
            DB::rollBack();
            return back();
        }
    }
}