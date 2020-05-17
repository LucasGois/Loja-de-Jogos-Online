<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_vendas', function (Blueprint $table) {
            $table->id();
            $table->double('quantidade', 15, 5);
            $table->double('subtotal', 15, 5);
            $table->unsignedBigInteger('id_venda');
            $table->unsignedBigInteger('id_produto');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_venda')->references('id')->on('vendas');
            $table->foreign('id_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_vendas', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
