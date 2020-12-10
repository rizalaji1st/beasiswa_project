<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PekerjaanIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaan_ibu = array(
            array("TIDAK BEKERJA", 10),
            array("Lainnya", 8),
            array("Petani", 6),
            array("Wirausaha", 4),
            array("Peg. Swasta", 3),
            array("PNS", 1),
            array("TNI / POLRI", 1),
        );

    	    for ($row = 0; $row < count($pekerjaan_ibu); $row++) {
            DB::table('pekerjaan_ibu')->insert([
                'id_pekerjaan_ibu'=>$row+1,
                'status'=>$pekerjaan_ibu[$row][0],
                'skor'=>$pekerjaan_ibu[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
