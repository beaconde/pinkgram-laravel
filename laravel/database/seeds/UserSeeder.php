<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");

        DB::table('users')->insert([
           'name' => 'Bea',
           'surname' => 'Conde',
           'nick' => 'ramiralek',
           'email' => 'bea@gmail.com',
           'password' => Hash::make('bea'),
           'image' => 'anon.png',
           'created_at' => now(),
           'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Alberto',
            'surname' => 'Bulpe',
            'nick' => 'kelsier94',
            'email' => 'alberto@gmail.com',
            'password' => Hash::make('alberto'),
            'image' => 'anon.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Abraham',
            'surname' => 'Álvarez',
            'nick' => 'abalvi',
            'email' => 'abraham@gmail.com',
            'password' => Hash::make('abraham'),
            'image' => 'anon.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
