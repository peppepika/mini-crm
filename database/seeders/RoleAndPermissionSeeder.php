<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => PermissionEnum::MANAGE_USERS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_PROJECT->value]);
        Permission::create(['name' => PermissionEnum::DELETE_CLIENT->value]);
        Permission::create(['name' => PermissionEnum::DELETE_TASK->value]);

        Role::create(['name' => RoleEnum::USER->value, 'guard_name' => 'web']);
        Role::create(['name' => RoleEnum::ADMIN->value, 'guard_name' => 'web'])->givePermissionTo([
            PermissionEnum::MANAGE_USERS,
            PermissionEnum::DELETE_PROJECT,
            PermissionEnum::DELETE_CLIENT,
            PermissionEnum::DELETE_TASK,
        ]);

    }
}
