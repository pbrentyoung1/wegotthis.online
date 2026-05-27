<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserProfile>
 */
class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'job_title' => fake()->jobTitle(),
            'department' => fake()->randomElement(['Communications', 'Creative', 'Production', 'Worship', 'Leadership']),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'country' => 'United States',
            'timezone' => fake()->randomElement(['America/Chicago', 'America/New_York', 'America/Denver', 'America/Los_Angeles']),
            'website' => fake()->optional()->url(),
            'avatar_path' => fake()->optional()->randomElement([
                '/images/headshots/headshot-01.jpeg',
                '/images/headshots/headshot-02.jpeg',
                '/images/headshots/headshot-03.jpeg',
                '/images/headshots/headshot-04.jpeg',
                '/images/headshots/headshot-05.jpeg',
                '/images/headshots/headshot-06.jpeg',
                '/images/headshots/headshot-07.jpeg',
                '/images/headshots/headshot-08.jpeg',
            ]),
            'bio' => fake()->optional()->sentence(16),
            'facebook_url' => fake()->optional()->url(),
            'instagram_handle' => fake()->optional()->userName(),
            'linkedin_url' => fake()->optional()->url(),
            'x_handle' => fake()->optional()->userName(),
            'status' => fake()->randomElement(['active', 'active', 'active', 'invited', 'inactive']),
            'last_seen_at' => fake()->dateTimeBetween('-7 days'),
        ];
    }
}
