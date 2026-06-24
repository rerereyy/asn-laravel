<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Campaign>
 */
class CampaignFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'cover_image' => fake()->imageUrl(),
            'target_amount' => fake()->numberBetween(1000000, 50000000),
            'current_amount' => 0,
            'donor_count' => 0,
            'category' => fake()->randomElement(['Pendidikan', 'Kesehatan', 'Bencana', 'Anak Yatim', 'Panti Asuhan']),
            'status' => 'active',
            'deadline_at' => now()->addWeeks(4),
        ];
    }
}
