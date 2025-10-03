<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Makanan Ringan',
                'description' => 'Berbagai jenis makanan ringan dan cemilan'
            ],
            [
                'name' => 'Minuman',
                'description' => 'Minuman kemasan dan siap saji'
            ],
            [
                'name' => 'Sembako',
                'description' => 'Bahan pokok kebutuhan sehari-hari'
            ],
            [
                'name' => 'Perlengkapan Mandi',
                'description' => 'Sabun, sampo, pasta gigi, dll'
            ],
            [
                'name' => 'Rokok',
                'description' => 'Berbagai merek rokok'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('Categories seeded successfully!');
    }
}
