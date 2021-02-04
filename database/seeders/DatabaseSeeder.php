<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Utilisateur1",
            'email' => "dummy@dummy.com",
            'password' => bcrypt("azerty")
        ]);

        DB::table('users')->insert([
            'name' => "Utilisateur2",
            'email' => "dummy2@dummy.com",
            'password' => bcrypt("azerty")
        ]);

        DB::table('songs')->insert([
            'titre' => 'chanson 1',
            'url' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
            'votes' => 1350,
            'user_id' => 1
        ]);

        DB::table('songs')->insert([
            'titre' => 'chanson 2',
            'url' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_1MG.mp3',
            'votes' => 13050,
            'user_id' => 1
        ]);

        DB::table('songs')->insert([
            'titre' => 'chanson 3',
            'url' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_1MG.mp3',
            'votes' => 150,
            'user_id' => 2
        ]);
    }    
}