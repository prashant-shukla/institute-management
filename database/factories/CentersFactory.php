<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centers>
 */
class CentersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'logo' => $this->faker->imageUrl(), 
            'receipt_header' => $this->faker->boolean(),
            'course_code' => $this->faker->numberBetween(1, 10), 
            'reg_no_start_from' => $this->faker->numberBetween(1, 10), 
            'receipt_no_start_from' => $this->faker->numberBetween(1, 10),
            'email' => $this->faker->safeEmail(),
            'mobile_no' => $this->faker->phoneNumber(),
            'phone_no' => $this->faker->phoneNumber(),
            'gstin' => $this->faker->numberBetween(50, 500), 
            'address' => $this->faker->streetAddress(),
            'state'=>$this->faker->name(),
            'cite'=>$this->faker->name(),
            'nonatc'=>$this->faker->boolean(),
        ];
    }
}
