<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

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
