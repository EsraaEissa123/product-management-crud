<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->word(),
            // 'price' => fake()->numberBetween(21,30),
            'quantity'=>fake()->numberBetween(0,1000),
            'image' => fake()->imageUrl($width=200, $height=100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
