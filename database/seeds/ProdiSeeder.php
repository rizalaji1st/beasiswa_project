<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ref_prodi = array(
            array(1, "Kimia"),
            array(2, "Fisika"),
            array(3, "Teknik Mesin"),
            array(4, "Farmasi"),
            array(5, "Kedokteran"),
            array(6, "Sastra Inggris"),
            array(7, "Sastra Arab"),
            array(8, "Kebidanan"),
            array(9, "Teknik Kimia"),
            array(10, "Sosiologi"),
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
