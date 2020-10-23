<?php

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
        $this->call(RefJenisFile::class);
        $this->call(RefKriteria::class);
        $this->call(TableRefFakultasSeeder::class);
    }
}
