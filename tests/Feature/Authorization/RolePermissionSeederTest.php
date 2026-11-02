<?php

use Database\Seeders\RolePermissionSeeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

test('it seeds the default roles and permissions', function () {
    $this->seed(RolePermissionSeeder::class);

    $admin = Role::findByName('admin');
    $user = Role::findByName('user');

    expect(Permission::whereIn('name', ['view dashboard', 'manage users'])->count())->toBe(2)
        ->and($admin->hasPermissionTo('view dashboard'))->toBeTrue()
        ->and($admin->hasPermissionTo('manage users'))->toBeTrue()
        ->and($user->hasPermissionTo('view dashboard'))->toBeTrue()
        ->and($user->hasPermissionTo('manage users'))->toBeFalse();
});

test('it can be run repeatedly without duplicating roles or permissions', function () {
    $this->seed(RolePermissionSeeder::class);
    $this->seed(RolePermissionSeeder::class);

    expect(Role::whereIn('name', ['admin', 'user'])->count())->toBe(2)
        ->and(Permission::whereIn('name', ['view dashboard', 'manage users'])->count())->toBe(2);
});
