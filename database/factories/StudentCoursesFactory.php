<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_courses>
 */
class StudentCoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(2, 11),
            'certificate_number' => $this->faker->integer(),
            'course_id' => $this->faker->numberBetween(2, 11),
            'enrolled'=>$this->faker->date(),
            'completion'=>$this->faker->date(),
            'certificate_issued'=>$this->faker->date(),
            'remark'=>$this->faker->name(),
        ];
    }
}
