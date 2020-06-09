<?php

namespace App\Http\Controllers;

use Auth;
use App\Cliente;
use App\Produto;
use App\ProdutoVenda;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                return back()->withInput();
            }
        }

        $produtos[] = Produto::find($id_produto);

        session()->put('produtos', $produtos);

        return back()->withInput();
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

        /*
        $req->validate([
            'nome' => 'required|min:3|unique:cidades,nome'
        ]);
        */

        if($id > 0){
            $venda = Venda::find($id);
        } else {
            $venda = new Venda();
        }
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;
        $id_endereco = $req->input('id_endereco') ?? 0;

        if($id_endereco === 0){
            return redirect()->route('endereco_lista');
        }

        $produtos = session()->get('produtos');

        $venda->id_cliente = $id_cliente;
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

        $this->limpar();

        return redirect()->route('home');
    }
}