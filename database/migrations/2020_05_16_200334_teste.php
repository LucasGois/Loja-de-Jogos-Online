<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Categoria;
use App\CategoriasProdutos;
use App\Produto;

class Teste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

        $categoria = new Categoria();
        $categoria->nome = "ação";
        $categoria->save();

        $categorias_produtos = new CategoriasProdutos();
        $categorias_produtos->id_produto = Produto::find(1)->id;
        $categorias_produtos->id_categoria = Categoria::find(1)->id;
        $categorias_produtos->save();

        $categorias_produtos = new CategoriasProdutos();
        $categorias_produtos->id_produto = Produto::find(2)->id;
        $categorias_produtos->id_categoria = Categoria::find(1)->id;
        $categorias_produtos->save();
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
