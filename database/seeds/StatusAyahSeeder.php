<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatusAyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_ayah = array(
            array("hidup", 3),
            array("bercerai", 6),
            array("wafat", 10),
        );

                for ($row = 0; $row < count($status_ayah); $row++) {
                DB::table('status_ayah')->insert([
                        'id_status_ayah'=>$row+1,
                        'status'=>$status_ayah[$row][0],
                        'skor'=>$status_ayah[$row][1],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]);
            }
    }
}
