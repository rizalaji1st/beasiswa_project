<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TanggunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $tanggungan = array(
            array(1, 1), 
            array(2, 2), 
            array(3, 3), 
            array(4, 4), 
            array(5, 5), 
            array(6, 6), 
            array(7, 7), 
            array(8, 8), 
            array(9, 9), 
            array(0, 1),

         );

                 for ($row = 0; $row < count($tanggungan); $row++) {
                DB::table('bea_tanggungan')->insert([
                        'id_tanggungan'=>$row+1,
                        'tanggungan'=>$tanggungan[$row][0],
                        'skor'=>$tanggungan[$row][1],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]);
            }

    }
}
