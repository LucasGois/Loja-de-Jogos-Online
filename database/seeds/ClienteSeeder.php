<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder {

    public function run() {
        DB::table('clientes')->insert([
            'id_user' => 1,
            'cpf' => '320.186.709-80',
            'rg' => '49.887.408-4',
            'data_nascimento' => '1998-04-03',
            'telefone' => '49 98508-1861',
            'admin' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('clientes')->insert([
            'id_user' => 2,
            'cpf' => '320.186.709-82',
            'rg' => '49.887.408-5',
            'data_nascimento' => '1998-04-03',
            'telefone' => '49 98508-1860',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

}