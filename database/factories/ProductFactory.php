<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\NullableType;

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
            'description' => fake()->paragraph(),
            'rating' => 0,
            // 'product_image' => fake()->imageUrl(640, 480, 'Food'),
            'product_image' => 'product_images/3QGEdVbkdMVC0InuaIHl8aTGXrMshbJoKciRiOM2.jpg',

        ];
    }
}
