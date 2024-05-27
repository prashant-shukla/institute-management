<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->name(),
            'slug'=>$this->faker->slug(),
            'course_period'=>$this->faker->word(),
            'branch_id'=>$this->faker->numberBetween(1, 10),
            'max_software'=>$this->faker->numberBetween(1, 5),
            'popular_course'=>$this->faker->boolean(),
            'image' =>$this->faker->imageUrl(),
            'description'=>$this->faker->sentence(),
            'site_title' =>$this->faker->sentence(),
            'meta_keyword' =>$this->faker->words(3, true),
            'meta_description'=>$this->faker->sentence()
        ];
    }
}
