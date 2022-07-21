<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
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
            ['kode_mata_pelajaran' => 'D12','nama_mata_pelajaran'=>'Fisika','semester'=>'4','jurusan'=>'IT'],
            ['kode_mata_pelajaran' => 'D15','nama_mata_pelajaran'=>'Fisika','semester'=>'2','jurusan'=>'Otomotif'],
        ];

        //masukan data ke dalam database
        DB::table('jurusan')->insert($sampel);
    }
}
