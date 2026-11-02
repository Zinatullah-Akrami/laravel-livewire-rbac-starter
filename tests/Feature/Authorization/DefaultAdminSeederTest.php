<?php

use App\Models\User;

test('database seeder creates a default admin user', function () {
    $this->seed();

    $admin = User::where('email', 'test@example.com')->firstOrFail();

    expect($admin->name)->toBe('Test User')
        ->and($admin->hasRole('admin'))->toBeTrue();
});

test('database seeder can be run repeatedly', function () {
    $this->seed();
    $this->seed();

    expect(User::where('email', 'test@example.com')->count())->toBe(1)
        ->and(User::where('email', 'test@example.com')->firstOrFail()->hasRole('admin'))->toBeTrue();
});
