<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat permissions
        $permissions = [
            'view products',
            'manage own products',
            'purchase products',
            'view orders',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); // ✅ FIXED
        }

        // Buat roles dan tetapkan permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $merchantRole = Role::firstOrCreate(['name' => 'Merchant']);
        $customerRole = Role::firstOrCreate(['name' => 'Customer']);

        // Admin memiliki semua permissions
        $adminRole->syncPermissions(Permission::all());

        // Merchant memiliki permission tertentu
        $merchantRole->syncPermissions([
            'view products',
            'manage own products',
            'view orders',
        ]);

        // Customer memiliki permission tertentu
        $customerRole->syncPermissions([
            'view products',
            'purchase products',
        ]);
    }
}
