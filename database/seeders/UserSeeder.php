<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat akun Admin
        \App\Models\User::create([
            'name' => 'Admin ZIS',
            'email' => 'admin@zis.com',
            'password' => bcrypt('password123'), // Password dienkripsi
            'role' => 'admin',
        ]);

        // Membuat akun Amil (Staff) contoh
        \App\Models\User::create([
            'name' => 'Amil Zakat',
            'email' => 'amil@zis.com',
            'password' => bcrypt('password123'),
            'role' => 'amil',
        ]);
    }

}
