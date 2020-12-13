<?php

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = array(
            'Kimia',
            'Fisika',
            'Teknik Mesin',
            'Farmasi',
            'Teknik Kimia',
            'Kedokteran',
            'Sastra Inggris',
            'Sastra Arab'
        );

        foreach ($prodi as $item) {
            DB::table('bea_ref_prodi')->insert([
                'nama_prodi' => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
