<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PendidikanIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_pendidikan_ibu = array(
            array("Tidak Sekolah", 10),
            array("SD/MI / Sederajat", 9),
            array("SMP/MTs / Sederajat", 8),
            array("SMA/MA / Sederajat", 7),
            array("D1 / Sederajat", 6),
            array("D2 / Sederajat", 5),
            array("D3 / Sederajat", 4),
            array("D4/S1 / Sederajat", 2),
            array("S2/Sp1 / Sederajat", 0),
        );

        for ($row=0; $row < count($status_pendidikan_ibu); $row++) { 
        	DB::table('bea_pendidikan_ibu')->insert([
        		'id_pendidikan_Ibu'=>$row+1,
        		'status'=>$status_pendidikan_ibu[$row][0],
        		'skor'=>$status_pendidikan_ibu[$row][1],
        		'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
        	]);
        }
    }
}
