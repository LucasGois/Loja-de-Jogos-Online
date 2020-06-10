<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotosProdutoSeeder extends Seeder {

    public function run() {
        DB::table('fotos_produto')->insert([
            'nome' => 'storage/imagens_produtos/1-1-cyberpunk-2077.jpg',
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}