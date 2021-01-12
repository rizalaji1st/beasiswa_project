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
				array(15, "Tidak Berpenghasilan", 0, 20), 
				array(15, "1.000", "250.000", 19), 
				array(15, "250.001", "500.000", 18),
				array(15, "500.001", "750.000", 17),
				array(15, "750.001", "1.000.000", 16),
				array(15, "1.000.001", "1.250.000", 15),
				array(15, "1.250.001", "1.500.000", 14),
				array(15, "1.500.001", "1.750.000", 13),
				array(15, "1.750.001", "2.000.000", 12),
				array(15, "2.000.001", "2.250.000", 11),
				array(15, "2.250.001", "2.500.000", 10),
				array(15, "2.500.001", "2.750.000", 9),
				array(15, "2.750.001", "3.000.000", 8),
				array(15, "3.000.001", "3.250.000", 7),
				array(15, "3.250.001", "3.500.000", 6),
				array(15, "3.500.001", "3.750.000", 5),
				array(15, "3.750.001", "4.000.000", 4),
				array(15, "4.000.001", "4.250.000", 3),
				array(15, "4.250.001", "4.500.000", 2),
				array(15, "4.500.001", "4.750.000", 1),
				array(15, "4.750.001", "5.000.000", 0),
    );
        for ($row = 0; $row < count($penghasilan_ayah); $row++) {
					DB::table('penghasilan_ayah')->insert([
							'id_penghasilan_ayah'=>$row+1,
							'id_kriteria'=>$penghasilan_ayah[$row][0],
							'penghasilan_min'=>$penghasilan_ayah[$row][1],
							'penghasilan_max'=>$penghasilan_ayah[$row][2],
							'skor'=>$penghasilan_ayah[$row][3],
							'created_at'=>Carbon::now(),
							'updated_at'=>Carbon::now()
						]);
			}
    }
}