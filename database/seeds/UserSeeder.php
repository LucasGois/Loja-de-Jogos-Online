<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    public function run() {
        DB::table('users')->insert([
            'name' => 'Lilly Cybergoth',
            'email' => 'lilly@gmail.com',
            'password' => Hash::make('senha'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Belle Delphine',
            'email' => 'belle@gmail.com',
            'password' => Hash::make('senha'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
