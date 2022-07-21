<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
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
            ['nis' => '032456', 'nama_siswa' => 'Rifki','alamat_siswa'=>'Bandung','tanggal_lahir'=>'2005-01-23'],
            ['nis' => '032466', 'nama_siswa' => 'Riski','alamat_siswa'=>'Bandung','tanggal_lahir'=>'2004-11-25'],
        ];

        //masukan data ke dalam database
        DB::table('siswa')->insert($sampel);
    }
}
