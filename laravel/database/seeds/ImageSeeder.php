<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        DB::statement("ALTER TABLE images AUTO_INCREMENT = 1;");

        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => 'placeholder.png',
            'description' => 'Imagen de Bea',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('images')->insert([
            'user_id' => 2,
            'image_path' => 'placeholder.png',
            'description' => 'Imagen de Alberto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('images')->insert([
            'user_id' => 3,
            'image_path' => 'placeholder.png',
            'description' => 'Imagen de Abraham',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
