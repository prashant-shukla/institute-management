<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Study_materials>
 */
class StudyMaterialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), 
            'description' => $this->faker->paragraph, 
            'file_type' => $this->faker->randomElement(['doc', 'audio', 'video']), 
            'file_path' => $this->faker->filePath(), 
            'uploaded_by' => $this->faker->numberBetween(1, 100), 
            'upload_date' => $this->faker->dateTimeThisYear(), 
            'course_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
