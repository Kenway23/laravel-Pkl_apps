<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiTableSeeder extends Seeder
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
            ['nis' => '06123','kode_mata_pelajaran'=>'D12','nilai'=>80,'grade'=>' '],
            ['nis' => '06124','kode_mata_pelajaran'=>'D15','nilai'=>60,'grade'=>' '],
        ];

        //masukan data ke dalam database
        DB::table('nilai')->insert($sampel);
    }
}
