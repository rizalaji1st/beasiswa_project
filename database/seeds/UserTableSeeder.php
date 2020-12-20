<?php

use App\Role;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),

        // ]);
        
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $adminuniversitasRole = Role::where('name','adminuniversitas')->first();
        $adminfakultasRole = Role::where('name','adminfakultas')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' => 'Super User',
            'email' => 'superuser@superuser.com',
            'password' => Hash::make('superuser')
        ]);

        $adminuniversitas = User::create([
            'name' => 'Admin Universitas',
            'email' => 'universitass@universitas.com',
            'password' => Hash::make('universitas')
        ]);

        $adminfakultas = User::create([
            'name' => 'Admin Fakultas',
            'email' => 'fakultas@fakultas.com',
            'password' => Hash::make('fakultas')
        ]);

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
        
        $user1 = User::create([
            'name' => 'Rendi Jaka Susanto',
            'email' => 'rendijaka@student.uns.ac.id',
            'password' => Hash::make('Rendijaka'),
            'nim' => 'M3118074',
            'nama' => 'Rendi Jaka Susanto',
            'ipk'=>'3',
            'ips'=>'4',
            'semester'=>'5',
            'alamat' => 'Cilacap',
            'kabupaten' => 'Cilacap',
            'provinsi' => 'Jawa Tengah',
            'kode_prodi' => 'KIP01',
            'penghasilan' => '3000000',
            'nama_ayah' => 'Dwi Windu Suroyo',
            'status_ayah' => 'meninggal',
            'pend_ayah' => 'SMA',
            'pekerjaan_ayah' =>'Guru',
            'gaji_ayah' => '2000000',
            'nama_ibu' => 'Sumarni',
            'status_ibu' => 'hidup',
            'pend_ibu' => 'SMP',
            'pekerjaan_ibu'=>'wirausaha',
            'gaji_ibu' => '1000000',
            'jml_tanggungan' => '3',
            'status_rumah' => 'Sendiri',
        ]);
        $user2 = User::create([
            'name' => 'Joni Budiyanto',
            'email' => 'joni@student.uns.ac.id',
            'password' => Hash::make('Jonibudiyanto'),
            'nim' => 'M3118074',
            'nama' => 'Joni Budiyanto',
            'ipk'=>'3.1',
            'ips'=>'4.0',
            'semester'=>'5',
            'alamat' => 'Sukoharjo, Jawa Tengah',
            'kabupaten' => 'Sukoharjo',
            'provinsi' => 'Jawa Tengah',
            'kode_prodi' => 'KIP02',
            'penghasilan' => '3000000',
            'nama_ayah' => 'Suroyo',
            'status_ayah' => 'Cerai',
            'pend_ayah' => 'SMP',
            'pekerjaan_ayah' =>'Pedagang',
            'gaji_ayah' => '700000',
            'nama_ibu' => 'Sumarni',
            'status_ibu' => 'Hidup',
            'pend_ibu' => 'S1',
            'pekerjaan_ibu'=>'wirausaha',
            'gaji_ibu' => '700000',
            'jml_tanggungan' => '3',
            'status_rumah' => 'Sendiri',
        ]);
        $user3 = User::create([
            'name' => 'Milasari',
            'email' => 'milsari@student.uns.ac.id',
            'password' => Hash::make('Milsari'),
            'nim' => 'M3118090',
            'nama' => 'Milasari',
            'ipk'=>'3.1',
            'ips'=>'3.3',
            'semester'=>'5',
            'alamat' => 'Gemolong, Sragen',
            'kabupaten' => 'Sragen',
            'provinsi' => 'Jawa Tengah',
            'kode_prodi' => 'MIPA02',
            'penghasilan' => '9000000',
            'nama_ayah' => 'Windu',
            'status_ayah' => 'Hidup',
            'pend_ayah' => 'S2',
            'pekerjaan_ayah' =>'',
            'gaji_ayah' => '7000000',
            'nama_ibu' => 'Wati',
            'status_ibu' => 'Hidup',
            'pend_ibu' => 'S1',
            'pekerjaan_ibu'=>'wirausaha',
            'gaji_ibu' => '2000000',
            'jml_tanggungan' => '3',
            'status_rumah' => 'Sendiri',
        ]);
        $user4 = User::create([
            'name' => 'Tony Stark',
            'email' => 'tony@student.uns.ac.id',
            'password' => Hash::make('1234'),
            'nim' => 'M3118012',
            'nama' => 'Tony Stark',
            'ipk'=>'3.5',
            'ips'=>'3.2',
            'semester'=>'5',
            'alamat' => 'Pabelan',
            'kabupaten' => 'Sukoharjo',
            'provinsi' => 'Jawa Tengah',
            'kode_prodi' => 'MIPA02',
            'penghasilan' => '10000000',
            'nama_ayah' => 'Stark',
            'status_ayah' => 'hidup',
            'pend_ayah' => 'S3',
            'pekerjaan_ayah' =>'Dosen',
            'gaji_ayah' => '8000000',
            'nama_ibu' => 'Wanti',
            'status_ibu' => 'hidup',
            'pend_ibu' => 'SMP',
            'pekerjaan_ibu'=>'wirausaha',
            'gaji_ibu' => '2000000',
            'jml_tanggungan' => '2',
            'status_rumah' => 'Sendiri',
            
        ]);
        
        

        $admin->roless()->attach($adminRole);
        $adminuniversitas->roless()->attach($adminuniversitasRole);
        $adminfakultas->roless()->attach($adminfakultasRole);
        $user1->roless()->attach($userRole);
        $user2->roless()->attach($userRole);
        $user3->roless()->attach($userRole);
        $user4->roless()->attach($userRole);
    }
}
