<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TableRefFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakultas = array(
            'Fakultas Keguruan dan Ilmu Pendidikan',
            'Fakultas Matematika dan Ilmu Alam',
            'Fakultas Kedokteran',
            'Fakultas Pertanian',
            'Fakultas Teknik',
            'Fakultas Ilmu Budaya',
            'Fakultas Ekonomi Bisnis',
            'Fakultas Hukum',
            'Fakultas Seni Rupa dan Desain',
            'Fakultas Ilmu Sosial dan Politik',
            'Fakultas Keolahragaan'
        );
        $i = 1;
        foreach ($fakultas as $fak) {

            DB::table('bea_ref_fakultas')->insert([
                'id_fakultas' => $i,
                'nama_fakultas' => $fak,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $i++;
        }
    }
}
