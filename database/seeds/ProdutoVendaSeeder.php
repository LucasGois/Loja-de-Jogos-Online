<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoVendaSeeder extends Seeder {

    public function run() {
        // Venda 1
        DB::table('produtos_vendas')->insert([
            'quantidade' => 1,
            'subtotal' => 10.0,
            'id_venda' => 1,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Venda 2
        DB::table('produtos_vendas')->insert([
            'quantidade' => 2,
            'subtotal' => 5.0,
            'id_venda' => 2,
            'id_produto' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Venda 3
        DB::table('produtos_vendas')->insert([
            'quantidade' => 1,
            'subtotal' => 10.0,
            'id_venda' => 3,
            'id_produto' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('produtos_vendas')->insert([
            'quantidade' => 1,
            'subtotal' => 5.0,
            'id_venda' => 3,
            'id_produto' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

}