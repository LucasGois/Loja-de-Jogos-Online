<?php

use Illuminate\Database\Seeder;

class PlataformasProdutosSeeder extends Seeder {
    
    public function run() {
        DB::table('plataformas_produtos')->insert([
            'id_plataforma' => 1,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('plataformas_produtos')->insert([
            'id_plataforma' => 2,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('plataformas_produtos')->insert([
            'id_plataforma' => 3,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }

}