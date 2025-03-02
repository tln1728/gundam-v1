<?php

namespace Database\Seeders;

use App\Models\VariantAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VariantAttribute::create([
            'name' => 'Màu sắc',
        ]);

        VariantAttribute::create([
            'name' => 'Kích thước',
        ]);
    }
}
