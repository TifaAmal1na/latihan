<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat role
        $roles = ['super admin', 'owner', 'manajer petshop', 'pegawai petshop', 'dokter klinik', 'pegawai klinik', 'pelanggan'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Buat pengguna dengan role masing-masing
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => 'password', 'role' => 'super admin'],
            ['name' => 'Owner', 'email' => 'owner@example.com', 'password' => 'password', 'role' => 'owner'],
            ['name' => 'Manajer Petshop', 'email' => 'manajer@example.com', 'password' => 'password', 'role' => 'manajer petshop'],
            ['name' => 'Pegawai Petshop', 'email' => 'pegawai.petshop@example.com', 'password' => 'password', 'role' => 'pegawai petshop'],
            ['name' => 'Dokter Klinik', 'email' => 'dokter@example.com', 'password' => 'password', 'role' => 'dokter klinik'],
            ['name' => 'Pegawai Klinik', 'email' => 'pegawai.klinik@example.com', 'password' => 'password', 'role' => 'pegawai klinik'],
            ['name' => 'Pelanggan', 'email' => 'pelanggan@example.com', 'password' => 'password', 'role' => 'pelanggan'],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);

            // Assign role ke user
            $user->assignRole($userData['role']);
        }
    }
}
