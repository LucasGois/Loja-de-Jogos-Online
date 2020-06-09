<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasProdutosSeeder extends Seeder {

    public function run() {
        DB::table('categorias_produtos')->insert([
            'id_categoria' => 1,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('categorias_produtos')->insert([
            'id_categoria' => 3,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('categorias_produtos')->insert([
            'id_categoria' => 4,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }

}