<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            CidadeSeeder::class,
            EnderecoSeeder::class,
            ProdutoSeeder::class,
            FotosProdutoSeeder::class,
            CategoriaSeeder::class,
        ]);
    }
}
