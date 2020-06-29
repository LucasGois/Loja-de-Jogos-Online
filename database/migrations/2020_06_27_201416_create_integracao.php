<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegracao extends Migration {

    public function up() {
        Schema::create('integracao', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 250);
            $table->string('url', 250);
            $table->string('token', 250);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('integracao');
    }

}