<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseCategory>
 */
class CourseCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'name' =>$this->faker-> name(),
            'slug'=>$this->faker->slug(),
            'software'=>json_encode(["test"=>$this->faker->word()]),
            'description'=>$this->faker->sentence(),
            'sub_title'=>$this->faker->sentence(),
            'image' =>$this->faker->imageUrl(),
            'order' =>$this->faker-> numberBetween(1,100),
            'show_on_website' =>$this->faker->integer(),
            'site_title' =>$this->faker->sentence(),
            'meta_keyword' =>$this->faker->words(3, true),
            'meta_description'=>$this->faker->sentence()
        ];
    }
}


