<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\CourseSyllabus;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseSyllabus>
 */
class CourseSyllabusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CourseSyllabus::class;
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'course_duration' => $this->faker->numberBetween(1, 12) . ' months',
            'live_sessions' => $this->faker->numberBetween(5, 50) . ' sessions',
            'projects' => $this->faker->numberBetween(1, 10) . ' projects',
            'mode' => $this->faker->randomElement(['online', 'offline', 'both']),
            'assignment' => $this->faker->sentence,
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
