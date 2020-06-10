<?php

use Illuminate\Database\Seeder;

class PlataformaSeeder extends Seeder {

    public function run() {
            DB::table('plataformas')->insert([
                'nome' => 'PC',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    
            DB::table('plataformas')->insert([
                'nome' => 'XBOX',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    
            DB::table('plataformas')->insert([
                'nome' => 'PS',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }

}