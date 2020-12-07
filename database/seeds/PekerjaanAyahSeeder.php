<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PekerjaanAyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaan_ayah = array(
            array("TIDAK BEKERJA", 10),
            array("Lainnya", 8),
            array("Petani", 6),
            array("Wirausaha", 4),
            array("Peg. Swasta", 3),
            array("PNS", 1),
            array("TNI / POLRI", 1),
        );

    	    for ($row = 0; $row < count($pekerjaan_ayah); $row++) {
            DB::table('bea_pekerjaan_ayah')->insert([
                'id_pekerjaan_Ayah'=>$row+1,
                'status'=>$pekerjaan_ayah[$row][0],
                'skor'=>$pekerjaan_ayah[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
