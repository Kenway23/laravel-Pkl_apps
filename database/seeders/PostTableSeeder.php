<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sampel = [
            ['title' => 'Assalaam Juara', 'content' => 'Assalaam Studio'],
            ['title' => 'Assalaam Berkurban', 'content' => 'Assalaam Studio'],
            ['title' => 'Assalaam Bersholawat', 'content' => 'Assalaam Studio'],
        ];

        //masukan data ke dalam database
        DB::table('posts')->insert($sampel);
    }
}
