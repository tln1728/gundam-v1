<?php

namespace Database\Factories;

use App\Models\Category;
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
        // category_id
        // name
        // slug
        // description
        // price
        // thumbnail
        return [
            'category_id' => Category::factory(),
            'name'        => fake()->words(5, true),
            'slug'        => fake()->slug(),
            'description' => fake()->paragraph(),
            'price'       => fake()->randomFloat(2,100000,999999999),
            'thumbnail'   => "https://picsum.photos/".fake()->numberBetween(700, 1000),
        ];
    }
}
