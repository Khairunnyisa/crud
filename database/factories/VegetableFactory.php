<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vegetable>
 */
class VegetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama-sayur' => fake()->word(),
            'harga-sayur'     =>fake()->randomFloat(2, 1, 100)
        ];
    }
}
