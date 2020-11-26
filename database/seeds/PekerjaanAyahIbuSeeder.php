<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PekerjaanAyahIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaan_ayah_ibu = array(
            array("TIDAK BEKERJA", 10),
            array("Lainnya", 8),
            array("Petani", 6),
            array("Wirausaha", 4),
            array("Peg. Swasta", 3),
            array("PNS", 1),
            array("TNI / POLRI", 1),
        );

    	    for ($row = 0; $row < count($pekerjaan_ayah_ibu); $row++) {
            DB::table('bea_pekerjaan_ayah_ibu')->insert([
                'id_pekerjaan_AyahIbu'=>$row+1,
                'status'=>$pekerjaan_ayah_ibu[$row][0],
                'skor'=>$pekerjaan_ayah_ibu[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
