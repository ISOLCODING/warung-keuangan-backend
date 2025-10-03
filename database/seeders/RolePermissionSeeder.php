<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'transaction.create',
            'transaction.read',
            'transaction.update',
            'transaction.delete',
            'product.manage',
            'category.manage',
            'user.manage',
            'report.view',
            'report.generate',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'sanctum']);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'sanctum']);
        $admin->givePermissionTo(Permission::all());

        $kasir = Role::create(['name' => 'kasir', 'guard_name' => 'sanctum']);
        $kasir->givePermissionTo([
            'transaction.create',
            'transaction.read',
            'product.manage',
            'report.view',
        ]);
    }
}
