<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_fees>
 */
class StudentFeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 100),
            'course_id' => $this->faker->numberBetween(2, 100),
            'fee_amount' => $this->faker->randomFloat(2, 1000, 5000),
            'received_on' => $this->faker->date(),
            'payment_mode' => $this->faker->randomElement(['cash', 'credit_card', 'bank_transfer']),

        ];
    }
}
