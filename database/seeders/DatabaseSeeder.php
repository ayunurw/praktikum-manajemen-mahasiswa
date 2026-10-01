<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        Mahasiswa::create([
            'nim' => '25781082',
            'nama' => 'Ayu Nur Wulandari',
            'program_studi' => 'Manajemen Informatika',
            'email' => 'ayunurw00@gmail.com',
            'angkatan' => '2025',
        ]);

        Mahasiswa::create([
            'nim' => '25781103',
            'nama' => 'Sondang Imelda',
            'program_studi' => 'Manajemen Informatika',
            'email' => 'bedeng21@gmail.com',
            'angkatan' => '2002',
        ]);
    }
}