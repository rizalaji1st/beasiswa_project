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
        	array("Rp. 1.000", "Rp. 250.000", 19), 
       		array("Rp. 250.001", "Rp. 500.000", 18),
       		array("Rp. 500.001", "Rp. 750.000", 17),
       		array("Rp. 750.001", "Rp. 1.000.000", 16),
       		array("Rp. 1.000.001", "Rp. 1.250.000", 15),
       		array("Rp. 1.250.001", "Rp. 1.500.000", 14),
       		array("Rp. 1.500.001", "Rp. 1.750.000", 13),
       		array("Rp. 1.750.001", "Rp. 2.000.000", 12),
       		array("Rp. 2.000.001", "Rp. 2.250.000", 11),
       		array("Rp. 2.250.001", "Rp. 2.500.000", 10),
       		array("Rp. 2.500.001", "Rp. 2.750.000", 9),
       		array("Rp. 2.750.001", "Rp. 3.000.000", 8),
       		array("Rp. 3.000.001", "Rp. 3.250.000", 7),
       		array("Rp. 3.250.001", "Rp. 3.500.000", 6),
       		array("Rp. 3.500.001", "Rp. 3.750.000", 5),
       		array("Rp. 3.750.001", "Rp. 4.000.000", 4),
       		array("Rp. 4.000.001", "Rp. 4.250.000", 3),
       		array("Rp. 4.250.001", "Rp. 4.500.000", 2),
       		array("Rp. 4.500.001", "Rp. 4.750.000", 1),
       		array("Rp. 4.750.001", "Rp. 5.000.000", 0),


       	);

        for ($row = 0; $row < count($penghasilan_ayah); $row++) {
        		DB::table('bea_penghasilan_ayah')->insert([
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