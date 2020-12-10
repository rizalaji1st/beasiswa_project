<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakultas = array(
            'Fisika',
            'Kimia',
            'Farmasi',
            'Teknik Mesin',
            'Teknik Kimia',
            'Kedokteran',
            'Teknik Informatika'
        );
        $i = 1;
        foreach ($fakultas as $fak) {

            DB::table('bea_ref_prodi')->insert([
                'id_prodi' => $i,
                'nama_prodi' => $fak,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $i++;
        }
    }
}
