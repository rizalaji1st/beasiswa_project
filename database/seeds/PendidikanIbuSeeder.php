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
            array(5, "Tidak Sekolah", 10),
            array(5, "SD/MI / Sederajat", 9),
            array(5, "SMP/MTs / Sederajat", 8),
            array(5, "SMA/MA / Sederajat", 7),
            array(5, "D1 / Sederajat", 6),
            array(5, "D2 / Sederajat", 5),
            array(5, "D3 / Sederajat", 4),
            array(5, "D4/S1 / Sederajat", 2),
            array(5, "S2/Sp1 / Sederajat", 0),
        );

            for ($row=0; $row < count($status_pendidikan_ibu); $row++) { 
                DB::table('pendidikan_ibu')->insert([
                    'id_pendidikan_ibu'=>$row+1,
                    'id_kriteria'=>$status_pendidikan_ibu[$row][0],
                    'status'=>$status_pendidikan_ibu[$row][1],
                    'skor'=>$status_pendidikan_ibu[$row][2],
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]);
            }
    }
}
