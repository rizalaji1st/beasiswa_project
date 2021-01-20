<?php

use App\Status\PekerjaanAyah;
use App\Status\PekerjaanIbu;
use App\Status\PendidikanAyah;
use App\Status\PendidikanIbu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(JenisBeasiswaSeeder::class);
        // $this->call(RefJenisFile::class);
        $this->call(RefKriteria::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TableRefFakultasSeeder::class);
        $this->call(RefProdiSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(JenisBeasiswaSeeder::class);
        // $this->call(PekerjaanAyahSeeder::class);
        // $this->call(PekerjaanIbuSeeder::class);
        // $this->call(PendidikanAyahSeeder::class);
        // $this->call(PendidikanIbuSeeder::class);
        // $this->call(StatusAyahSeeder::class);
        // $this->call(StatusIbuSeeder::class);
        // $this->call(StatusRumahSeeder::class);
        // $this->call(TanggunganSeeder::class);
        
    }
}
