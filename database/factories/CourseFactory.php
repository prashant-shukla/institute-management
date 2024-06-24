<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => Str::slug($this->faker->name()),
            'course_duration' => $this->faker->numberBetween(1, 12) . ' months',
            'coursecategories_id' => \App\Models\CourseCategory::factory(), // Assuming you have a CourseCategory factory
            'sub_title' => $this->faker->sentence,
            'popular_course' => $this->faker->boolean,
            'description' => $this->faker->text(160),
            'site_title' => $this->faker->words(3, true),
            'meta_keyword' => $this->faker->words(5, true),
            'meta_description' => $this->faker->text(255),
            'mode' => $this->faker->randomElement(['online', 'offline', 'both']),
            'sessions' => $this->faker->numberBetween(1, 100),
            'projects' => $this->faker->numberBetween(1, 10),
            'fee' => $this->faker->randomFloat(2, 1000, 10000),
            'offer_fee' => $this->faker->randomFloat(2, 500, 9000),
            'faqs' => $this->faker->paragraph,
        ];
    }
}
