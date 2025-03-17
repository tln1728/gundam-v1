<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Gundam Models',
            'slug' => 'gundam-models',
        ]);
        
        Category::create([
            'name' => 'Gundam Accessories',
            'slug' => 'gundam-accessories',
        ]);
    }
}
