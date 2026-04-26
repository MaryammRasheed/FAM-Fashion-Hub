<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Women Clothes', 'slug' => 'women-clothes', 'is_active' => true],
            ['name' => 'Men Clothes',   'slug' => 'men-clothes',   'is_active' => true],
            ['name' => 'Shoes',         'slug' => 'shoes',         'is_active' => true],
            ['name' => 'Bags',          'slug' => 'bags',          'is_active' => true],
            ['name' => 'Jewellery',     'slug' => 'jewellery',     'is_active' => true],
            ['name' => 'Cosmetics',     'slug' => 'cosmetics',     'is_active' => true],
            ['name' => 'Skincare',      'slug' => 'skincare',      'is_active' => true],
            ['name' => 'Accessories',   'slug' => 'accessories',   'is_active' => true],
            ['name' => 'Kids',          'slug' => 'kids',          'is_active' => true],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        $this->command->info('✅ Categories seeded!');
    }
}
