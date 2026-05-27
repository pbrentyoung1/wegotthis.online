<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->jobTitle();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
            'icon' => fake()->randomElement(['shield-lock', 'users-group', 'writing', 'clipboard-text', 'settings-2']),
            'color' => fake()->randomElement(['primary', 'success', 'warning', 'info', 'secondary']),
        ];
    }
}
