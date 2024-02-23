<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'user_name' => $user->name,
            'user_id' => $user->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1, 5)
        ];
    }
}
