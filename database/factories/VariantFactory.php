<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // product_id
        // variant_name
        // sku
        // stock
        // extra_price
        return [
            'product_id'    => Product::factory(),
            'variant_name'  => fake()->word(),
            'sku'           => fake()->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
            'stock'         => fake()->numberBetween(0, 200),
            'extra_price'   => fake()->randomFloat(2, 0, 200000),
        ];
    }
}
