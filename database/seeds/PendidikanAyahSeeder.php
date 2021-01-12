<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PendidikanAyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_pendidikan_ayah = array(
            array(4, "Tidak Sekolah", 10),
            array(4, "SD/MI / Sederajat", 9),
            array(4, "SMP/MTs / Sederajat", 8),
            array(4, "SMA/MA / Sederajat", 7),
            array(4, "D1 / Sederajat", 6),
            array(4, "D2 / Sederajat", 5),
            array(4, "D3 / Sederajat", 4),
            array(4, "D4/S1 / Sederajat", 2),
            array(4, "S2/Sp1 / Sederajat", 0),
        );

            for ($row=0; $row < count($status_pendidikan_ayah); $row++) { 
                DB::table('pendidikan_ayah')->insert([
                    'id_pendidikan_ayah'=>$row+1,
                    'id_kriteria'=>$status_pendidikan_ayah[$row][0],
                    'status'=>$status_pendidikan_ayah[$row][1],
                    'skor'=>$status_pendidikan_ayah[$row][2],
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]);
        }
    }
}
