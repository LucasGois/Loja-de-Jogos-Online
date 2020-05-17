<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlataformasProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataformas_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_plataforma');
            $table->unsignedBigInteger('id_produto');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_plataforma')->references('id')->on('plataformas');
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
        Schema::dropIfExists('plataformas_produtos', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }
}
