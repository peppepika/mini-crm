<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $clients = Client::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'deadline' => now()->addDays(rand(1, 30))->format('d-m-Y'),
            'status' => $this->faker->randomElement(ProjectStatus::cases())->value,
            'user_id' => $this->faker->randomElement($users),
            'client_id' => $this->faker->randomElement($clients),
        ];
    }
}
