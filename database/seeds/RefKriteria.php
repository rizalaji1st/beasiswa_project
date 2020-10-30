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
            'Status Ayah (STA)',
            'Status Ibu (STI)',
            'Status Rumah (SR)',
            'Pendidikan Ayah (SPA)',
            'Pendidikan Ibu (SPI)',
            'Pekerjaan Ayah (SKA)',
            'Pekerjaan Ibu (SKI)',
            'Tanggungan',
            'Penghasilan Ayah',
            'Penghasilan Ibu',
            'Penghasilan',
        );
        foreach ($kriteria as $item) {
            DB::table('bea_ref_kriteria')->insert([
                'nama_kriteria' => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
}
