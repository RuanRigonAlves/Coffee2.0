<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomNumber(2),
            'category' => fake()->randomElement(['Food', 'Drink', 'Dessert']),
            'rating' => fake()->randomFloat(2, 0, 5),
            'product_image' => fake()->imageUrl(640, 480, 'Food'),

        ];
    }
}
