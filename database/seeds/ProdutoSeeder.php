<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder {

    public function run() {
        DB::table('produtos')->insert([
            'nome' => 'Cyberpunk 2077',
            'descricao' => 'GOTY',
            'estoque' => 10,
            'slug' => 'top-mano',
            'valor' => 0.02,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('produtos')->insert([
            'nome' => 'The Elder Scrolls VI: Skyrim II',
            'descricao' => 'GOTY II',
            'estoque' => 10,
            'slug' => 'top-top-mano',
            'valor' => 0.01,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

}