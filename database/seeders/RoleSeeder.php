<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat Role
        $roles = [
            'super admin',
            'owner',
            'manajer petshop',
            'pegawai petshop',
            'dokter klinik',
            'pegawai klinik',
            'pelanggan'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Contoh permission (tambahkan sesuai kebutuhan)
        $permissions = [
            'manage users',
            'manage orders',
            'manage products',
            'manage clinics'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign semua permission ke Super Admin
        $superAdmin = Role::where('name', 'super admin')->first();
        $superAdmin->givePermissionTo(Permission::all());
    }
}
