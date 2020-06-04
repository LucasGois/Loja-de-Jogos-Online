<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;
use App\Categoria;
use App\CategoriasProdutos;
use App\Produto;
use App\Plataforma;
use App\PlataformaProduto;
use App\Venda;
use App\Endereco;
use App\Cidade;
use App\Cliente;
use App\ProdutoVenda;

class Teste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*
        $produto = new Venda();
        $produto->total = 100;
        $produto->id_cliente = 1;
        $produto->id_endereco = 1;
        $produto->save();

        $produto = new ProdutoVenda();
        $produto->quantidade = 100;
        $produto->subtotal = 10;
        $produto->id_venda = 1;
        $produto->id_produto = 1;
        $produto->save();

        $produto = new ProdutoVenda();
        $produto->quantidade = 100;
        $produto->subtotal = 10;
        $produto->id_venda = 1;
        $produto->id_produto = 2;
        $produto->save();*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
