<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mahasiswa = array(
        	array("M3118074", "Rendi Jaka Susanto", "Sindangbarang", "Cilacap", "Jawa Tengah", "00000", "Rp.700.000","Dwi Windu Suroyo", "Wafat" , "SMA/MA / Sederajat","Tidak bekerja", "Rp.0","Sumarni","hidup", "SMP/MTs / Sederajat","wirausaha","Rp.700.000","3","Sendiri"),


       	);
        for ($row = 0; $row < count($mahasiswa); $row++) {
            DB::table('bea_mahasiswa')->insert([
                'id_mahasiswa'=>$row+1,
                'nim'=>$mahasiswa[$row][0],
                'nama'=>$mahasiswa[$row][1],
                'alamat'=>$mahasiswa[$row][2],
                'kabupaten'=>$mahasiswa[$row][3],
                'provinsi'=>$mahasiswa[$row][4],
                'kode_prodi'=>$mahasiswa[$row][5],
                'penghasilan'=>$mahasiswa[$row][6],
                'nama_ayah'=>$mahasiswa[$row][7],
                'status_ayah'=>$mahasiswa[$row][8],
                'pend_ayah'=>$mahasiswa[$row][9],
                'pekerjaan_ayah'=>$mahasiswa[$row][10],
                'gaji_ayah'=>$mahasiswa[$row][11],
                'nama_ibu'=>$mahasiswa[$row][12],
                'status_ibu'=>$mahasiswa[$row][13],
                'pend_ibu'=>$mahasiswa[$row][14],
                'pekerjaan_ibu'=>$mahasiswa[$row][15],
                'gaji_ibu'=>$mahasiswa[$row][16],
                'jml_tanggungan'=>$mahasiswa[$row][17],
                'status_rumah'=>$mahasiswa[$row][18],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()    
            ]);  
        }
        
    }
}
