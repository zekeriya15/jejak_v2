<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'trip-daftar',
            'trip-review',
            'trip-list',
            'trip-create',
            'trip-update',
            'trip-delete',
            'booking-list',
        ];

        // Create permissions without assigning them to roles
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
