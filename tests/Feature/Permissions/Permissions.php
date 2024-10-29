<?php

use App\Enums\RoleEnum;
use App\Models\User;
use Database\Seeders\RoleAndPermissionSeeder;

beforeEach(function() {
    $this->seed(RoleAndPermissionSeeder::class);
    $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
});

it('checks user dashboard does not show users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/dashboard')->assertDontSee('Users');
});

it('checks admin dashboard shows users', function () {
    $admin = User::factory()->create();
    $admin->assignRole(RoleEnum::ADMIN->value);

    $this->actingAs($admin)->get('/dashboard')->assertSee('Users');
});
