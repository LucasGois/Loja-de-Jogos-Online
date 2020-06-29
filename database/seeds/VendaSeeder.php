<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendaSeeder extends Seeder {

    public function run() {
        DB::table('vendas')->insert([
            'total' => 0.0,
            'id_cliente' => 1,
            'id_endereco' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('vendas')->insert([
            'total' => 0.0,
            'id_cliente' => 1,
            'id_endereco' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('vendas')->insert([
            'total' => 0.0,
            'id_cliente' => 2,
            'id_endereco' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

}