<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class JenisBeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $beasiswa = array(
            'Beasiswa penghargaan',
            'Beasiswa bantuan',
            'Beasiswa penelitian',
            'Beasiswa non-akademik',
            'Beasiswa ikatan dinas',
            'Beasiswa penuh (Full Scholarship)',
            'Beasiswa sebagian (Partial Scholarship)',
            'Beasiswa dari pemerintah',
            'Beasiswa dari pihak swasta',
            'Beasiswa dari negara maju atau donor',
            'Beasiswa dari komunitas, organisasi, atau yayasan',
            'Beasiswa perguruan tinggi',
        );
        foreach($beasiswa as $item){
            DB::table('bea_ref_jenis_beasiswa')->insert([
                'nama_beasiswa'=>$item,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()    
            ]);  
        }
        
    }
}
