<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PenghasilanAyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $penghasilan_ayah = array(
        	array("Tidak Berpenghasilan", 0, 20), 
        	array("1.000", "250.000", 19), 
       		array("250.001", "500.000", 18),
       		array("500.001", "750.000", 17),
       		array("750.001", "1.000.000", 16),
       		array("1.000.001", "1.250.000", 15),
       		array("1.250.001", "1.500.000", 14),
       		array("1.500.001", "1.750.000", 13),
       		array("1.750.001", "2.000.000", 12),
       		array("2.000.001", "2.250.000", 11),
       		array("2.250.001", "2.500.000", 10),
       		array("2.500.001", "2.750.000", 9),
       		array("2.750.001", "3.000.000", 8),
       		array("3.000.001", "3.250.000", 7),
       		array("3.250.001", "3.500.000", 6),
       		array("3.500.001", "3.750.000", 5),
       		array("3.750.001", "4.000.000", 4),
       		array("4.000.001", "4.250.000", 3),
       		array("4.250.001", "4.500.000", 2),
       		array("4.500.001", "4.750.000", 1),
       		array("4.750.001", "5.000.000", 0),


       	);

        for ($row = 0; $row < count($penghasilan_ayah); $row++) {
        		DB::table('penghasilan_ayah')->insert([
		                'id_penghasilan_ayah'=>$row+1,
		                'penghasilan_min'=>$penghasilan_ayah[$row][0],
		                'penghasilan_max'=>$penghasilan_ayah[$row][1],
						'skor'=>$penghasilan_ayah[$row][2],
		                'created_at'=>Carbon::now(),
		                'updated_at'=>Carbon::now()
		            ]);
			}

    }
}