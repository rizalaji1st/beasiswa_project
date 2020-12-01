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
        
        // $user = User::create([
        //     'name' => 'Rendi Jaka Susanto',
        //     'email' => 'rendijaka@student.uns.ac.id',
        //     'password' => Hash::make('1234'),
        //     'nim' => 'M3118074',
        //     'nama' => 'Rendi Jaka Susanto',
        //     'alamat' => 'Cilacap',
        //     'kabupaten' => 'Cilacap',
        //     'provinsi' => 'Jawa Tengah',
        //     'kode_prodi' => '000000',
        //     'penghasilan' => '',
        //     'nama_ayah' => 'Dwi Windu Suroyo',
        //     'status_ayah' => 'Wafat',
        //     'pend_ayah' => 'SMA',
        //     'pekerjaan_ayah' =>'',
        //     'gaji_ayah' => '700000',
        //     'nama_ibu' => 'Sumarni',
        //     'status_ibu' => 'Sehat',
        //     'pend_ibu' => 'SMP',
        //     'pekerjaan_ibu'=>'wirausaha',
        //     'gaji_ibu' => '700000',
        //     'jml_tanggungan' => '3',
        //     'status_rumah' => 'Sendiri',
        //     'ipk'=>'3',
        //     'ips'=>'4',
        //     'semester'=>'5s'
        // ]);

        $mahasiswa = array(
            array("M3118074", "Rendi Jaka Susanto", "Sindangbarang", "Cilacap", "Jawa Tengah", "00000", "Rp.700.000","Dwi Windu Suroyo", "Wafat" , "SMA/MA / Sederajat","Tidak bekerja", "Rp.0","Sumarni","hidup", "SMP/MTs / Sederajat","wirausaha","Rp.700.000","3","Sendiri","Rendi Jaka Susanto","rendijaka@student.uns.ac.id","1234","4","4","6"),
            array("M3118076", "Dummy Data", "Sindangbarang", "Cilacap", "Jawa Tengah", "00000", "Rp.700.000","Dwi Windu Suroyo", "Wafat" , "SMA/MA / Sederajat","Tidak bekerja", "Rp.0","Sumarni","hidup", "SMP/MTs / Sederajat","wirausaha","Rp.700.000","3","Sendiri", "Puskom","puskom@student.uns.ac.id","1234","4","4","6"),
        );
        $i = 1;
        for ($row = 0; $row < count($mahasiswa); $row++) {
            $user = User::create([
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
                'name' => $mahasiswa[$row][19],
                'email' => $mahasiswa[$row][20],
                'password' => Hash::make($mahasiswa[$row][21]),
                'ips' => $mahasiswa[$row][22],
                'ipk' => $mahasiswa[$row][23],
                'alamat' => $mahasiswa[$row][24],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()   
            ]);  
            $i++;
        }
        

        $admin->roless()->attach($adminRole);
        $adminuniversitas->roless()->attach($adminuniversitasRole);
        $adminfakultas->roless()->attach($adminfakultasRole);
        $user->roless()->attach($userRole);
    }
}
