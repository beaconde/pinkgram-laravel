<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::statement("ALTER TABLE comments AUTO_INCREMENT = 1;");

        DB::table('comments')->insert([
            'user_id' => 1,
            'image_id' => 2,
            'content' => 'Comentario de Bea en la foto de Alberto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'image_id' => 1,
            'content' => 'Comentario de Alberto en la foto de Bea',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'user_id' => 3,
            'image_id' => 3,
            'content' => 'Comentario de Abraham en la foto de Abraham',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
