<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpOption\None;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
        'reg_date' => $this->faker->date() ?: '28/05/2024',
        'reg_no' => $this->faker->biasedNumberBetween(1000, 9999),
        'center_id' => $this->faker->numberBetween(1, 10),
        'name' => $this->faker->name(),
        'father_name' => $this->faker->name(),
        // 'mother_name' => $this->faker->name() ?: 'None',
        'date_of_birth' => $this->faker->date(),
        'email' => $this->faker->safeEmail(),
        'correspondence_add' => $this->faker->address(),
        'permanent_add' => $this->faker->streetAddress(),
        'qualification' => $this->faker->sentence(), 
        'college_workplace' => $this->faker->company(), 
        'photo' => $this->faker->imageUrl(), 
        'residential_no' => $this->faker->phoneNumber(), 
        'office_no' => $this->faker->phoneNumber(), 
        'mobile_no' => $this->faker->phoneNumber(),
        'branch_id' => $this->faker->numberBetween(1, 10), 
        'course_id' => $this->faker->numberBetween(2, 11), 
        // 'software_covered' => json_encode(["test"=>$this->faker->word()]),
        // 'apply_gst' => $this->faker->boolean(),
        'course_fee' => $this->faker->numberBetween(1000, 10000), 
        // 'gst' => $this->faker->numberBetween(1, 10000), 
        // 'total' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
