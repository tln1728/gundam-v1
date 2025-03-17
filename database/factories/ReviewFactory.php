<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::inRandomOrder()->first()->id;
        $product_id = Product::inRandomOrder()->first()->id;

        return [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comment' => fake()->realText(50),
            'rating' => fake()->numberBetween(1,10),
        ];
    }
}
