<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'category_id' => 1,
                'name' => 'Divine Eagle Gundam 1/100',
                'slug' => 'divine-eagle-gundam-1-100',
                'description' => 'Thương hiệu: Divine Eagle\nChất liệu: Kim Loại + Nhựa abs/pom\nKích thước: 18cm\nTỷ lệ: 1/100\nLưu ý: Sản phẩm là hàng đặt trước. Tổng giá 2.900.000đ - đặt cọc 500.000đ + thanh toán 2.400.000đ khi nhận hàng. Sản phẩm phát hàng vào Quý 3 năm 2025.',
                'price' => 250000,
                'thumbnail' => 'https://picsum.photos/1000',
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name' => 'Unicorn Gundam RG 1/144',
                'slug' => 'unicorn-gundam-rg-1-144',
                'description' => 'Mô hình Unicorn Gundam tỷ lệ 1/144 thuộc dòng Real Grade. Có khả năng chuyển đổi giữa Unicorn và Destroy mode.',
                'price' => 750000,
                'thumbnail' => 'https://picsum.photos/1000',
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'name' => 'Gundam Action Base 1 Black',
                'slug' => 'gundam-action-base-1-black',
                'description' => "Đế trưng bày Gundam màu đen.\nTương thích với mô hình 1/144 và 1/100.",
                'price' => 1200000,
                'thumbnail' => 'https://picsum.photos/1000',
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'name' => 'Zaku II HG 1/144',
                'slug' => 'zaku-ii-hg-1-144',
                'description' => 'Mô hình Zaku II tỷ lệ 1/144 thuộc dòng High Grade. Kèm theo bazooka và heat hawk.',
                'price' => 280000,
                'thumbnail' => 'https://picsum.photos/1000',
                'images' => [
                    'https://picsum.photos/1000',
                    'https://picsum.photos/1000',
                ],
            ],
            [
                'id' => 5,
                'category_id' => 2,
                'name' => 'Metalbuild 1/100 Gundam Exia R4 - Bootleg',
                'slug' => 'metalbuild-1-100-gundam-exia-r4-bootleg',
                'description' => '\nThương hiệu: Divine Eagle\nChất liệu: Kim loại + Nhựa abs/ pom\nKích thước: 18cm\nTỷ lệ: 1/100\nLưu ý: Sản phẩm là hàng đặt trước. Tổng giá 2.900.000 đ- đặt cọc 500.000 đ + thanh toán 2.400.000 đ khi nhận hàng.\nSản phẩm phát hàng vào Quý 3 năm 2025.',
                'price' => 280000,
                'thumbnail' => 'https://picsum.photos/1000',
                'images' => [
                    'https://picsum.photos/1000',
                    'https://picsum.photos/1000',
                ],
            ],
        ];

        foreach ($products as $product) {
            $images = $product['images'] ?? [];

            unset($product['images']);

            Product::create($product);

            foreach ($images as $imgPath) {
                ProductImage::create([
                    'product_id' => $product['id'],
                    'image_url'  => $imgPath,
                ]);
            }
        }
    }
}
