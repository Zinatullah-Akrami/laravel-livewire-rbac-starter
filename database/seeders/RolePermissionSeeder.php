<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed the application's roles and permissions.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $viewDashboard = Permission::findOrCreate('view dashboard', 'web');
        $manageUsers = Permission::findOrCreate('manage users', 'web');

        $admin = Role::findOrCreate('admin', 'web');
        $user = Role::findOrCreate('user', 'web');

        $admin->syncPermissions([$viewDashboard, $manageUsers]);
        $user->syncPermissions([$viewDashboard]);
    }
}
