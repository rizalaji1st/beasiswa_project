<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RefProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kodeProdi = array(
            'KIP01',
            'KIP02',
            'MIPA01',
            'MIPA02',
            'T01',
            'T02',
            'P01',
            'P02',
            'EB01',
            'EB02',
        );
        $namaProdi = array(
            'Pendidikan Teknik Informatika Komputer',
            'Pendidikan Fisika',
            'Fisika',
            'Informatika',
            'Teknik Mesin',
            'Teknik Industri',
            'Pertanian',
            'Peternakan',
            'Sastra Inggris',
            'Sastra Arab',
        );

        $idFakultas = array(
            '1',
            '1',
            '2',
            '2',
            '4',
            '4',
            '6',
            '6',
            '7',
            '7',
        );
        foreach ($namaProdi as $item) {
            DB::table('bea_ref_kriteria')->insert([
                'nama_kriteria' => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for($i=0; $i <10;$i++){
            DB::table('bea_ref_prodi')->insert([
                'kode_prodi' => $kodeProdi[$i],
                'nama_prodi' => $namaProdi[$i],
                'id_fakultas' => $idFakultas[$i],
            ]);
        }
    }
}
