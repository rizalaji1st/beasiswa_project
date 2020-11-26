<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatusAyahIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_ayah_ibu = array(
            array("hidup", 3),
            array("bercerai", 6),
            array("wafat", 10),
        );

                for ($row = 0; $row < count($status_ayah_ibu); $row++) {
                DB::table('bea_status_ayah_ibu')->insert([
                        'id_statusAyahIbu'=>$row+1,
                        'status'=>$status_ayah_ibu[$row][0],
                        'skor'=>$status_ayah_ibu[$row][1],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]);
            }
    }
}
