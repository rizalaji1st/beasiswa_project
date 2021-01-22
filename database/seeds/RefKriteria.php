<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RefKriteria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kriteria = array(
            ['Status Ayah (STA)','STA'],
            ['Status Ibu (STI)','STI'],
            ['Status Rumah (SR)','SR'],
            ['Pendidikan Ayah (SPA)','SPA'],
            ['Pendidikan Ibu (SPI)','SPI'],
            ['Pekerjaan Ayah (SKA)','SKA'],
            ['Pekerjaan Ibu (SKI)','SKI'],
            ['Tanggungan','T'],
            ['Penghasilan Ayah','PA'],
            ['Penghasilan Ibu','PI'],
            ['Penghasilan','P'],
        );

        foreach ($kriteria as $item) {
            DB::table('bea_ref_kriteria')->insert([
                'id_jenis_kriteria' => $item[1],
                'nama_kriteria' => $item[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
}
