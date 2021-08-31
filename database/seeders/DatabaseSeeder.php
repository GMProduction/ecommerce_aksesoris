<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        DB::table('users')->insert([
//            'nama' => 'Admin',
//            'username' => 'admin',
//            'roles' => 'admin',
//            'alamat' => 'solo',
//            'no_hp' => '0123456',
//            'password' => Hash::make('admin'),
//        ]);

        DB::table('users')->insert([
            'nama' => 'Pimpinan',
            'username' => 'pimpinan',
            'roles' => 'pimpinan',
            'alamat' => 'solo',
            'no_hp' => '0123456',
            'email' => 'test@gmail.com',
            'password' => Hash::make('pimpinan'),
        ]);
    }
}
