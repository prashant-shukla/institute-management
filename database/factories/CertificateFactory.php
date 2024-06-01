<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'title' => 'Certificate of Completion',
            'course_id' => $this->faker->numberBetween(2, 11), 
            'logo_path' => $this->faker->imageUrl(),
            'background_path' => $this->faker->imageUrl(),
            'elements' => json_encode([
                'title_position' => ['top' => '50px', 'left' => '200px'],
                'name_position' => ['top' => '150px', 'left' => '200px'],
                'course_position' => ['top' => '250px', 'left' => '200px'],
                'date_position' => ['top' => '350px', 'left' => '200px'],
            ]),
        ];
    }
}
