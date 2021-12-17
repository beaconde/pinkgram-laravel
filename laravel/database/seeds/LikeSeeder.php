<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->delete();
        DB::statement("ALTER TABLE likes AUTO_INCREMENT = 1;");

        DB::table('likes')->insert([
            'user_id' => 1,
            'image_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('likes')->insert([
            'user_id' => 2,
            'image_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('likes')->insert([
            'user_id' => 3,
            'image_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
