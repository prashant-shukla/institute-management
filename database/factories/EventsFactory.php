<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'organizer' => $this->faker->company,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
            'paid' => $this->faker->randomElement([0, 1]), // Assuming 'paid' is a boolean field
            'photo' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'site_title' => $this->faker->sentence,
            'meta_keyword' => $this->faker->words(3, true),
            'meta_description' => $this->faker->sentence,
        ];
    }
}
