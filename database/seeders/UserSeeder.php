<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat semua role jika belum ada
        $roles = ['super admin', 'owner', 'manajer petshop', 'pegawai petshop', 'dokter klinik', 'pegawai klinik', 'pelanggan'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        // Buat user untuk setiap role
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'role' => 'super admin'],
            ['name' => 'Owner', 'email' => 'owner@example.com', 'role' => 'owner'],
            ['name' => 'Manajer Petshop', 'email' => 'manajer@example.com', 'role' => 'manajer petshop'],
            ['name' => 'Pegawai Petshop', 'email' => 'pegawai.petshop@example.com', 'role' => 'pegawai petshop'],
            ['name' => 'Dokter Klinik', 'email' => 'dokter@example.com', 'role' => 'dokter klinik'],
            ['name' => 'Pegawai Klinik', 'email' => 'pegawai.klinik@example.com', 'role' => 'pegawai klinik'],
            ['name' => 'Pelanggan', 'email' => 'pelanggan@example.com', 'role' => 'pelanggan'],
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

            // Beri role pada user
            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->syncRoles([$role]);
            }
        }
    }
}
