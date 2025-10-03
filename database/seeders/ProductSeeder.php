<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $products = [
            // Makanan Ringan
            [
                'name' => 'Indomie Goreng',
                'code' => 'IND-001',
                'price' => 3500,
                'stock' => 50,
                'min_stock' => 10,
                'description' => 'Mie instan rasa goreng'
            ],
            [
                'name' => 'Chitato',
                'code' => 'CHT-001',
                'price' => 12000,
                'stock' => 30,
                'min_stock' => 5,
                'description' => 'Keripik kentang rasa sapi panggang'
            ],
            [
                'name' => 'Tango Wafer',
                'code' => 'TNG-001',
                'price' => 8000,
                'stock' => 25,
                'min_stock' => 5,
                'description' => 'Wafer coklat'
            ],

            // Minuman
            [
                'name' => 'Aqua Botol 600ml',
                'code' => 'AQA-001',
                'price' => 5000,
                'stock' => 100,
                'min_stock' => 20,
                'description' => 'Air mineral kemasan botol'
            ],
            [
                'name' => 'Coca Cola 330ml',
                'code' => 'CCL-001',
                'price' => 8000,
                'stock' => 40,
                'min_stock' => 10,
                'description' => 'Minuman bersoda'
            ],
            [
                'name' => 'Teh Botol Sosro',
                'code' => 'TBS-001',
                'price' => 6000,
                'stock' => 35,
                'min_stock' => 8,
                'description' => 'Teh manis kemasan botol'
            ],

            // Sembako
            [
                'name' => 'Beras Ramos 5kg',
                'code' => 'BRS-001',
                'price' => 65000,
                'stock' => 15,
                'min_stock' => 3,
                'description' => 'Beras premium kemasan 5kg'
            ],
            [
                'name' => 'Minyak Goreng Bimoli 2L',
                'code' => 'MGB-001',
                'price' => 32000,
                'stock' => 20,
                'min_stock' => 5,
                'description' => 'Minyak goreng kemasan 2 liter'
            ],
            [
                'name' => 'Gula Gulaku 1kg',
                'code' => 'GGR-001',
                'price' => 15000,
                'stock' => 25,
                'min_stock' => 5,
                'description' => 'Gula pasir kemasan 1kg'
            ],

            // Rokok
            [
                'name' => 'Sampoerna Mild',
                'code' => 'SPM-001',
                'price' => 32000,
                'stock' => 50,
                'min_stock' => 10,
                'description' => 'Rokok Sampoerna Mild'
            ],
            [
                'name' => 'Marlboro Red',
                'code' => 'MLB-001',
                'price' => 35000,
                'stock' => 30,
                'min_stock' => 5,
                'description' => 'Rokok Marlboro Red'
            ],
        ];

        foreach ($products as $index => $product) {
            // Assign category berdasarkan index
            $categoryIndex = floor($index / 3); // 3 produk per kategori
            $categoryId = $categories[$categoryIndex]->id ?? $categories[0]->id;

            Product::create(array_merge($product, [
                'category_id' => $categoryId
            ]));
        }

        $this->command->info('Products seeded successfully!');
    }
}
