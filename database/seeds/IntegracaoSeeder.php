<?php

use Illuminate\Database\Seeder;
use App\Integracao;

class IntegracaoSeeder extends Seeder {

    public function run() {
        DB::table('integracao')->insert([
            'nome' => "CaçaPay",
            'url' => "http://webalunos.cacador.ifsc.edu.br/CacaPay/public/api/pagamentos",
            'token' => '$2y$10$D2C28IB5ioAG9VV6LeA9YOMzBjCBZMwrBuSNrsvLZjq.6jOTuQLs2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

}