<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->randomNumber(),
            'review' => $this->faker->sentence(),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => now(),
            'updated_at' => now(),
             ];
    }
}
