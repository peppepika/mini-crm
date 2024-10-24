<?php

namespace Database\Factories;

use App\Enums\TaskStatus;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $projects = Project::pluck('id')->toArray();
        $clients = Client::pluck('id')->toArray();

        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'user_id' => $this->faker->randomElement($users),
            'project_id' => $this->faker->randomElement($projects),
            'client_id' => $this->faker->randomElement($clients),
            'deadline_at' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
            'status' => $this->faker->randomElement(TaskStatus::cases())->value
        ];
    }
}
