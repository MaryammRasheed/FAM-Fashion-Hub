<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Get first vendor and categories
        $vendor = Vendor::first();
        if (!$vendor) {
            $this->command->warn('No vendor found. Run VendorSeeder first.');
            return;
        }

        $categories = Category::pluck('id', 'name');

        $products = [
            // Women Clothes
            [
                'name'        => 'Embroidered Lawn Suit',
                'category'    => 'Women Clothes',
                'price'       => 3500,
                'sale_price'  => 2800,
                'stock'       => 50,
                'description' => 'Beautiful embroidered lawn suit perfect for summer. Comes with dupatta and shalwar.',
                'images'      => ['images/clothes/ready women1.jpg'],
                'sizes'       => ['S', 'M', 'L', 'XL'],
                'colors'      => ['White', 'Blue', 'Pink'],
                'featured'    => true,
            ],
            [
                'name'        => 'Party Wear Frock',
                'category'    => 'Women Clothes',
                'price'       => 5500,
                'sale_price'  => 4500,
                'stock'       => 30,
                'description' => 'Elegant party wear frock with beautiful embellishments. Perfect for weddings and formal events.',
                'images'      => ['images/clothes/ready women-partyfrock7.jpg'],
                'sizes'       => ['S', 'M', 'L'],
                'colors'      => ['Red', 'Maroon', 'Navy'],
                'featured'    => true,
            ],
            [
                'name'        => 'Ready to Wear Suit',
                'category'    => 'Women Clothes',
                'price'       => 2800,
                'sale_price'  => null,
                'stock'       => 40,
                'description' => 'Comfortable ready-to-wear 3-piece suit for daily use.',
                'images'      => ['images/clothes/ready women-suit.jpg'],
                'sizes'       => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors'      => ['Green', 'Purple', 'Black'],
                'featured'    => false,
            ],
            // Men Clothes
            [
                'name'        => 'Men\'s Formal Kurta Pajama',
                'category'    => 'Men Clothes',
                'price'       => 2200,
                'sale_price'  => 1800,
                'stock'       => 60,
                'description' => 'Traditional kurta pajama set for men. Perfect for Eid and formal occasions.',
                'images'      => ['images/clothes/black kurta-pjama.jpg'],
                'sizes'       => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors'      => ['Black', 'White', 'Navy'],
                'featured'    => true,
            ],
            [
                'name'        => 'Men\'s Casual Shirt',
                'category'    => 'Men Clothes',
                'price'       => 1500,
                'sale_price'  => null,
                'stock'       => 80,
                'description' => 'Comfortable casual shirt for daily wear. Made from high-quality cotton.',
                'images'      => ['images/clothes/black shirt.jpg'],
                'sizes'       => ['S', 'M', 'L', 'XL'],
                'colors'      => ['Black', 'White', 'Blue'],
                'featured'    => false,
            ],
            [
                'name'        => 'Men\'s Slim Fit Jeans',
                'category'    => 'Men Clothes',
                'price'       => 2500,
                'sale_price'  => 2000,
                'stock'       => 45,
                'description' => 'Modern slim-fit jeans for the contemporary man.',
                'images'      => ['images/clothes/man-slim-fit-flared.jpg'],
                'sizes'       => ['30', '32', '34', '36', '38'],
                'colors'      => ['Blue', 'Black', 'Grey'],
                'featured'    => false,
            ],
            // Shoes Women
            [
                'name'        => 'Women\'s Elegant Heels',
                'category'    => 'Shoes',
                'price'       => 3200,
                'sale_price'  => 2500,
                'stock'       => 35,
                'description' => 'Stylish high heels perfect for parties and formal events.',
                'images'      => ['images/heels/1 (1).jpg'],
                'sizes'       => ['36', '37', '38', '39', '40'],
                'colors'      => ['Black', 'Nude', 'Red'],
                'featured'    => true,
            ],
            [
                'name'        => 'Women\'s Casual Flats',
                'category'    => 'Shoes',
                'price'       => 1800,
                'sale_price'  => null,
                'stock'       => 55,
                'description' => 'Comfortable flat shoes for everyday wear.',
                'images'      => ['images/flats/1.jpg'],
                'sizes'       => ['36', '37', '38', '39', '40', '41'],
                'colors'      => ['Black', 'White', 'Brown'],
                'featured'    => false,
            ],
            // Bags
            [
                'name'        => 'Ladies Handbag',
                'category'    => 'Bags',
                'price'       => 4500,
                'sale_price'  => 3800,
                'stock'       => 25,
                'description' => 'Premium quality ladies handbag with multiple compartments.',
                'images'      => ['images/shop/product/bags/1.jpg'],
                'sizes'       => [],
                'colors'      => ['Black', 'Brown', 'Beige'],
                'featured'    => true,
            ],
            [
                'name'        => 'Shoulder Bag',
                'category'    => 'Bags',
                'price'       => 2800,
                'sale_price'  => 2200,
                'stock'       => 30,
                'description' => 'Trendy shoulder bag perfect for daily use.',
                'images'      => ['images/shop/product/bags/2.jpg'],
                'sizes'       => [],
                'colors'      => ['Black', 'Red', 'Blue'],
                'featured'    => false,
            ],
            // Jewellery
            [
                'name'        => 'Gold Plated Necklace Set',
                'category'    => 'Jewellery',
                'price'       => 2500,
                'sale_price'  => null,
                'stock'       => 20,
                'description' => 'Elegant gold-plated necklace set with earrings. Perfect for weddings.',
                'images'      => ['images/shop/product/jewellery/IMG-20240430-WA0003.jpg'],
                'sizes'       => [],
                'colors'      => ['Gold'],
                'featured'    => true,
            ],
            [
                'name'        => 'Silver Bangle Set',
                'category'    => 'Jewellery',
                'price'       => 1500,
                'sale_price'  => 1200,
                'stock'       => 40,
                'description' => 'Beautiful silver-plated bangle set, set of 6 bangles.',
                'images'      => ['images/shop/product/jewellery/IMG-20240430-WA0005.jpg'],
                'sizes'       => [],
                'colors'      => ['Silver'],
                'featured'    => false,
            ],
            // Cosmetics
            [
                'name'        => 'Matte Lipstick Collection',
                'category'    => 'Cosmetics',
                'price'       => 800,
                'sale_price'  => 650,
                'stock'       => 100,
                'description' => 'Long-lasting matte lipstick available in 12 shades.',
                'images'      => ['images/makeup/1.jpg'],
                'sizes'       => [],
                'colors'      => ['Red', 'Pink', 'Nude', 'Coral', 'Berry'],
                'featured'    => false,
            ],
            [
                'name'        => 'Foundation SPF 30',
                'category'    => 'Cosmetics',
                'price'       => 1800,
                'sale_price'  => null,
                'stock'       => 60,
                'description' => 'Full coverage foundation with SPF 30 protection. Suitable for all skin types.',
                'images'      => ['images/makeup/2.jpg'],
                'sizes'       => [],
                'colors'      => ['Fair', 'Medium', 'Dark'],
                'featured'    => false,
            ],
            // Men Shoes
            [
                'name'        => 'Men\'s Leather Loafers',
                'category'    => 'Shoes',
                'price'       => 4000,
                'sale_price'  => 3200,
                'stock'       => 30,
                'description' => 'Premium leather loafers for men. Comfortable for daily office wear.',
                'images'      => ['images/loafers/1 (1).jpg'],
                'sizes'       => ['40', '41', '42', '43', '44', '45'],
                'colors'      => ['Black', 'Brown', 'Tan'],
                'featured'    => true,
            ],
        ];

        foreach ($products as $data) {
            $catName = $data['category'];
            $catId   = $categories[$catName] ?? null;

            if (!$catId) {
                // Try partial match
                foreach ($categories as $name => $id) {
                    if (stripos($name, $catName) !== false || stripos($catName, $name) !== false) {
                        $catId = $id;
                        break;
                    }
                }
            }

            if (!$catId) {
                $this->command->warn("Category not found: {$catName}, skipping product: {$data['name']}");
                continue;
            }

            $slug = Str::slug($data['name']) . '-' . uniqid();

            Product::create([
                'vendor_id'   => $vendor->id,
                'category_id' => $catId,
                'name'        => $data['name'],
                'slug'        => $slug,
                'description' => $data['description'],
                'price'       => $data['price'],
                'sale_price'  => $data['sale_price'],
                'sku'         => 'FAM-' . strtoupper(uniqid()),
                'stock'       => $data['stock'],
                'images'      => $data['images'],
                'sizes'       => $data['sizes'],
                'colors'      => $data['colors'],
                'status'      => 'active',
                'featured'    => $data['featured'] ?? false,
            ]);
        }

        $this->command->info('✅ ' . count($products) . ' products seeded!');
    }
}
