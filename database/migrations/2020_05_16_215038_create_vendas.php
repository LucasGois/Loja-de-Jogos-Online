<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendas extends Migration {

    public function up() {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->double('total', 15, 2);
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_endereco');
            $table->string('status_pagamento', 20)->default("PENDENTE");
            $table->string('status_entrega', 20)->default("PENDENTE");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
        });
    }

    public function down() {
        Schema::dropIfExists('vendas', function(Blueprint $table){
            $table->dropSoftDeletes(); 
        });
    }

}