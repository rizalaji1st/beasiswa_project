<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatusIbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_ibu = array(
            array(2, "hidup", 3),
            array(2, "bercerai", 6),
            array(2, "wafat", 10),
        );

                for ($row = 0; $row < count($status_ibu); $row++) {
                DB::table('status_ibu')->insert([
                        'id_status_ibu'=>$row+1,
                        'id_kriteria'=>$status_ibu[$row][0],
                        'status'=>$status_ibu[$row][1],
                        'skor'=>$status_ibu[$row][2],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]);
            }
    }
}
