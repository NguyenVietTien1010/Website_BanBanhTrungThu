<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $cat1 = Category::create(['name' => 'Bánh Nướng', 'slug' => 'banh-nuong']);
        $cat2 = Category::create(['name' => 'Bánh Dẻo', 'slug' => 'banh-deo']);

        Product::create([
            'category_id' => $cat1->id,
            'name' => 'Bánh Nướng Thập Cẩm (2 trứng)',
            'slug' => 'banh-nuong-thap-cam-2-trung',
            'description' => 'Hương vị truyền thống, đậm đà với 2 trứng muối.',
            'image' => 'products/placeholder.jpg', // Lưu ý: Bạn cần tự tạo file này trong public/storage/products
            'price' => 75000,
        ]);
        Product::create([
            'category_id' => $cat1->id,
            'name' => 'Bánh Nướng Đậu Xanh (1 trứng)',
            'slug' => 'banh-nuong-dau-xanh-1-trung',
            'description' => 'Nhân đậu xanh trứng muối ngọt bùi, thơm lừng.',
            'image' => 'products/placeholder.jpg',
            'price' => 65000,
        ]);
        Product::create([
            'category_id' => $cat2->id,
            'name' => 'Bánh Dẻo Thập Cẩm',
            'slug' => 'banh-deo-thap-cam',
            'description' => 'Vỏ bánh dẻo thơm, nhân đậm đà hương vị.',
            'image' => 'products/placeholder.jpg',
            'price' => 55000,
        ]);
    }
}