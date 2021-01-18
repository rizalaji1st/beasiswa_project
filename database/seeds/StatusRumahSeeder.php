<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatusRumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_rumah=array(
                array("Sendiri", 2, 3),
                array("Menumpang", 4, 3),
                array("Menumpang Tanpa Ijin", 6, 3),
                array("Sewa Tahunan", 8, 3),
                array("Sewa Bulanan", 10, 3),
                array("Tidak memiliki", 4, 3),
                );
                    for ($row=0; $row < count($status_rumah) ; $row++) { 
                        DB::table('bea_status_rumah')->insert([
                            'id_status_rumah'=>$row+1,
                            'status'=>$status_rumah[$row][0],
                            'skor'=>$status_rumah[$row][1],
                            'id_kriteria'=>$status_rumah[$row][2],
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now()
                            
                        ]);
                    }
    }
}
