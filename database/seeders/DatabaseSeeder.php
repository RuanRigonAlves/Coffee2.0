<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Product::factory(100)->create();

        User::factory(20)->create();

        Product::factory(100)->create()->each(function ($product) {
            $reviewsCount = rand(1, 10);

            for ($i = 0; $i < $reviewsCount; $i++) {
                Reviews::factory()->create([
                    'product_id' => $product->id,
                    'user_id' => User::inRandomOrder()->first()->id,
                ]);
            }
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
