<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            'id_cidade' => 1,
            'id_cliente' => 1,
            'descricao' => 'endereco',
            'logradouro' => 'logradouro',
            'numero' => '100',
            'bairro' => 'bairro',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
