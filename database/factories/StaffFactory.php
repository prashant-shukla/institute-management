<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 1000),
            'department' => $this->faker->randomElement(['HR', 'Driver', 'Teacher', 'Marketing','Peon']),
            'phone' => $this->faker->numerify('##########'),
            'date_joined' => $this->faker->date(),
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
