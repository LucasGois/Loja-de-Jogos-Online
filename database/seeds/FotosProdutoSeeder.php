<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotosProdutoSeeder extends Seeder {

    public function run() {
        DB::table('fotos_produto')->insert([
            'nome' => 'storage/imagens_produtos/cyberpunk-2077-1.jpeg',
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}