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
            array("hidup", 3),
            array("bercerai", 6),
            array("wafat", 10),
        );

                for ($row = 0; $row < count($status_ibu); $row++) {
                DB::table('status_ibu')->insert([
                        'id_status_ibu'=>$row+1,
                        'status'=>$status_ibu[$row][0],
                        'skor'=>$status_ibu[$row][1],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]);
            }
    }
}
