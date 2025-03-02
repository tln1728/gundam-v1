<?php

namespace Database\Seeders;

use App\Models\VariantValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Colors
        for ($i = 0; $i < 3; $i++) {
            VariantValue::create([
                'variant_attribute_id' => 1,
                'value' => fake()->unique()->colorName()
            ]);
        }

        // Sizes
        VariantValue::create([
            'variant_attribute_id' => 2,
            'value' => 'S'
        ]);
        VariantValue::create([
            'variant_attribute_id' => 2,
            'value' => 'M'
        ]);
        VariantValue::create([
            'variant_attribute_id' => 2,
            'value' => 'L'
        ]);
        VariantValue::create([
            'variant_attribute_id' => 2,
            'value' => 'XL'
        ]);
    }
}
