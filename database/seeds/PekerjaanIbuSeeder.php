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
            array(14, "TIDAK BEKERJA", 10),
            array(14, "Lainnya", 8),
            array(14, "Petani", 6),
            array(14, "Wirausaha", 4),
            array(14, "Peg. Swasta", 3),
            array(14, "PNS", 1),
            array(14, "TNI / POLRI", 1),
        );

    	    for ($row = 0; $row < count($pekerjaan_ibu); $row++) {
            DB::table('pekerjaan_ibu')->insert([
                'id_pekerjaan_ibu'=>$row+1,
                'id_kriteria'=>$pekerjaan_ibu[$row][0],
                'status'=>$pekerjaan_ibu[$row][1],
                'skor'=>$pekerjaan_ibu[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
