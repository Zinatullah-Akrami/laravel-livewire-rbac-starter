<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

test('users can be assigned roles', function () {
    $role = Role::create(['name' => 'editor']);
    $user = User::factory()->create();

    $user->assignRole($role);

    expect($user->hasRole('editor'))->toBeTrue();
});
