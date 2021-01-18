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
                        array(1, 1, 7), 
                        array(2, 2, 7), 
                        array(3, 3, 7), 
                        array(4, 4, 7), 
                        array(5, 5, 7), 
                        array(6, 6, 7), 
                        array(7, 7, 7), 
                        array(8, 8, 7), 
                        array(9, 9, 7), 
                        array(0, 1, 7),
                        );
                for ($row = 0; $row < count($tanggungan); $row++) {
                        DB::table('bea_tanggungan')->insert([
                                'id_tanggungan'=>$row+1,
                                'tanggungan'=>$tanggungan[$row][0],
                                'skor'=>$tanggungan[$row][1],
                                'id_kriteria'=>$tanggungan[$row][2],
                                'created_at'=>Carbon::now(),
                                'updated_at'=>Carbon::now()
                        ]);
                }
        }
}
