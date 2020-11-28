<?php

use App\Role;
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
        //
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
        
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);

        $admin->roless()->attach($adminRole);
        $adminuniversitas->roless()->attach($adminuniversitasRole);
        $adminfakultas->roless()->attach($adminfakultasRole);
        $user->roless()->attach($userRole);
    }
}
