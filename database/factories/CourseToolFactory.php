<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseTool;
use App\Models\Course;
use App\Models\Tool;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseTool>
 */
class CourseToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CourseTool::class;

    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'tool_id' => Tool::factory(),
            'sort' => $this->faker->numberBetween(1, 100),
        ];
    }
}
