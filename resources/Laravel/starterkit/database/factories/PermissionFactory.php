<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Permission>
 */
class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $action = fake()->unique()->randomElement([
            'View requests',
            'Approve deliverables',
            'Manage projects',
            'Edit assets',
            'Publish updates',
            'Review schedules',
        ]);

        return [
            'name' => $action,
            'slug' => Str::slug($action),
            'description' => fake()->sentence(8),
            'group_name' => fake()->randomElement(['Requests', 'Projects', 'Approvals', 'Assets', 'Scheduling']),
        ];
    }
}
