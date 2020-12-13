<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RefProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ref_prodi = array(
            array(1, "kimia"),
            array(2, "fisika"),
            array(3, "biologi"),
            array(4, "kebidanan"),
            array(5, "teknik mesin"),
            array(6, "teknik kimia"),
            array(7, "sastra arab"),
            array(8, "sastra inggris"),
            array(9, "hukum"),
            array(10, "pertanian"),
            array(11, "peternakan"),
        );

        for ($row = 0; $row < count($ref_prodi); $row++) {
            DB::table('bea_ref_prodi')->insert([
                    'kode_prodi'=>$row+1,
                    'id_fakultas'=>$ref_prodi[$row][0],
                    'nama_prodi'=>$ref_prodi[$row][1],
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]);
        }

    }
}
