<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // Buat role
        $roles = ['super admin', 'owner', 'manajer petshop', 'pegawai petshop', 'dokter klinik', 'pegawai klinik', 'pelanggan'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Buat user untuk setiap role (kecuali pelanggan yang default saat register)
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'role' => 'super admin'],
            ['name' => 'Owner', 'email' => 'owner@example.com', 'role' => 'owner'],
            ['name' => 'Manajer Petshop', 'email' => 'manajer@example.com', 'role' => 'manajer petshop'],
            ['name' => 'Pegawai Petshop', 'email' => 'pegawai.petshop@example.com', 'role' => 'pegawai petshop'],
            ['name' => 'Dokter Klinik', 'email' => 'dokter@example.com', 'role' => 'dokter klinik'],
            ['name' => 'Pegawai Klinik', 'email' => 'pegawai.klinik@example.com', 'role' => 'pegawai klinik'],
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make('password'), // Default password
                ]
            );

            // Assign role
            $user->assignRole($userData['role']);
        }
    }
}
