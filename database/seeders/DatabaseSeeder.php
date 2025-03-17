<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\VariantValue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,              // +1 user (admin)
            VariantAttributeSeeder::class,  // +2 biến thể (color, size)
            VariantValueSeeder::class,      // +7 giá trị biến thể (random 3 colors, S, M, L, XL)
            CategorySeeder::class,
            ProductSeeder::class,
            VariantSeeder::class,
        ]);

        // +10 users
        \App\Models\User::factory(10)->create();
        
        // Chỉ gọi khi đã có users và products
        \App\Models\Review::factory(20)->create();

        // +3 danh mục
        // \App\Models\Category::factory(3)->create();

        // +3 danh mục | mỗi dm cha 1 dm con
        // \App\Models\Category::factory(3)->withParent()->create();

        // +5 sản phẩm (ko biến thể) | +5 danh mục
        // \App\Models\Product::factory(5)->create();

        // +5 sản phẩm | mỗi sp 1 biến thể | mỗi biến thể 2-3 giá trị | +5 danh mục
 
        // \App\Models\Variant::factory(5)->create()->each(function ($variant) {
        //     // Lấy tất cả giá trị biến thể hiện có
        //     $variantValues = VariantValue::all();
            
        //     // Chọn ngẫu nhiên 2-3 giá trị biến thể để gắn vào variant
        //     $randomVariantValues = $variantValues->random(rand(2, 3));
            
        //     // Gắn các giá trị biến thể vào variant vào bảng pivot
        //     $variant->variantValues()->attach($randomVariantValues);
        // });
    }
}
