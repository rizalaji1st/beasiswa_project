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
            array(6, "TIDAK BEKERJA", 10),
            array(6, "Lainnya", 8),
            array(6, "Petani", 6),
            array(6, "Wirausaha", 4),
            array(6, "Peg. Swasta", 3),
            array(6, "PNS", 1),
            array(6, "TNI / POLRI", 1),
        );

    	    for ($row = 0; $row < count($pekerjaan_ayah); $row++) {
            DB::table('pekerjaan_ayah')->insert([
                'id_pekerjaan_ayah'=>$row+1,
                'id_kriteria'=>$pekerjaan_ayah[$row][0],
                'status'=>$pekerjaan_ayah[$row][1],
                'skor'=>$pekerjaan_ayah[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
