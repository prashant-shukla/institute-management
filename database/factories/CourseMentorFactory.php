<?php

namespace Database\Factories;

use App\Models\CourseMentor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseMentorFactory extends Factory
{
    protected $model = CourseMentor::class;

    public function definition()
    {
        return [
            'mentor_id' => \App\Models\Mentor::factory()->create()->id,
            'course_id' => \App\Models\Course::factory()->create()->id,
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}