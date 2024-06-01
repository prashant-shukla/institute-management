<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate_fields>
 */
class CertificateFieldsFactory extends Factory
{
    protected $model = CertificateField::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'field_name' => $this->faker->word,
            'table_name' => $this->faker->word,
            'column_name' => $this->faker->word,
        ];
        
    }
}
