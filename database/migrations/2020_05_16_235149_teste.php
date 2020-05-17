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
        /*$produto = new User();
        $produto->name = "Belle delphine";
        $produto->email = "belle@gmail.com";
        $produto->password = "1";
        $produto->save();*/

        $produto = new Produto();
        $produto->nome = "Cyberpunk 2077";
        $produto->descricao = "GOTY";
        $produto->estoque = 9;
        $produto->slug = "top-mano";
        $produto->valor = 199.99;
        $produto->save();

        $produto = new Produto();
        $produto->nome = "WWE 2K20";
        $produto->descricao = "Luta";
        $produto->estoque = 100;
        $produto->slug = "anao-mano";
        $produto->valor = 199.99;
        $produto->save();

        $produto = new Cidade();
        $produto->nome = "nome";
        $produto->estado = "estado";
        $produto->save();

        $produto = new Cliente();
        $produto->id_user = 1;
        $produto->nome = "Belle delphine";
        $produto->cpf = "123123";
        $produto->rg = "123123";
        $produto->data_nascimento = "2020-05-19";
        $produto->telefone = "telefone";
        $produto->email = "email";
        $produto->save();

        $produto = new Endereco();
        $produto->id_cidade = 1;
        $produto->id_cliente = 1;
        $produto->descricao = "descricao";
        $produto->logradouro = "logradouro";
        $produto->numero = "015";
        $produto->bairro = "bairro";
        $produto->save();

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
        $produto->save();
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
