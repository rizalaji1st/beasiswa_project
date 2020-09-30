<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RefJenisFile extends Seeder
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
            'Surat Keputusan Beasiswa',
            'Format Surat Lampiran',
            'Kartu Tanda Penduduk',
            'Kartu Tanda Mahasiswa',
            'Kartu Hasil Studi',
            'Kartu Rencana Studi',
            'Slip Pajak',
            'Slip Gaji Orang Tua',
            'Surat Rekomendasi',
            'Surat Pernyataan',
            'Bukti Tes TOUFL/IELS/EAP',
            'Passpoto',
            'Curriculum Vitae',
            'Surat Keterangan aktif kuliah'
        );
        foreach($beasiswa as $item){
            DB::table('bea_ref_jenis_file')->insert([
                'nama_jenis_file'=>$item,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()    
            ]);  
        }
    }
}
