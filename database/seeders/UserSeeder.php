<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'password'
        ])->syncRoles(RoleEnum::ADMIN);
        User::factory()->create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user@mail.com',
            'password' => 'password'
        ]);
    }
}
