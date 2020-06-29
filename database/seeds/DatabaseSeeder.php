<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            CidadeSeeder::class,
            EnderecoSeeder::class,
            ProdutoSeeder::class,
            FotosProdutoSeeder::class,
            CategoriaSeeder::class,
            CategoriasProdutosSeeder::class,
            PlataformaSeeder::class,
            PlataformasProdutosSeeder::class,
            VendaSeeder::class,
            ProdutoVendaSeeder::class,
            IntegracaoSeeder::class,
        ]);
    }

}