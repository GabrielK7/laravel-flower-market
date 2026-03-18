<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $products = [
            [
                'name' => 'Red Rose Bouquet',
                'description' => 'Classic romantic bouquet of fresh red roses.',
                'price' => 29.99,
                'stock' => 15,
                'image' => 'products/rose_red.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'White Rose Elegance',
                'description' => 'Elegant white roses for weddings and events.',
                'price' => 32.50,
                'stock' => 10,
                'image' => 'products/rose_white.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Spring Tulip Mix',
                'description' => 'Colorful mix of fresh tulips.',
                'price' => 24.90,
                'stock' => 20,
                'image' => 'products/tulip_mix.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Yellow Tulip Basket',
                'description' => 'Bright yellow tulips in a basket.',
                'price' => 26.00,
                'stock' => 8,
                'image' => 'products/tulip_yellow.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Pink Orchid Deluxe',
                'description' => 'Luxury pink orchid in decorative pot.',
                'price' => 39.99,
                'stock' => 5,
                'image' => 'products/orchid_pink.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'White Orchid Premium',
                'description' => 'Minimalist white orchid.',
                'price' => 42.00,
                'stock' => 4,
                'image' => 'products/orchid_white.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'Summer Flower Box',
                'description' => 'Mixed seasonal flowers in a gift box.',
                'price' => 34.90,
                'stock' => 12,
                'image' => 'products/seasonal_box.jpg',
                'category_id' => 4,
            ],
            [
                'name' => 'Autumn Colors Bouquet',
                'description' => 'Warm autumn tones bouquet.',
                'price' => 28.50,
                'stock' => 7,
                'image' => 'products/autumn.jpg',
                'category_id' => 4,
            ],
            [
                'name' => 'Wedding Rose Collection',
                'description' => 'Premium roses for wedding decoration.',
                'price' => 79.99,
                'stock' => 3,
                'image' => 'products/wedding_roses.jpg',
                'category_id' => 5,
            ],
            [
                'name' => 'Bridal Bouquet Deluxe',
                'description' => 'Elegant bridal bouquet.',
                'price' => 89.00,
                'stock' => 2,
                'image' => 'products/bridal.jpg',
                'category_id' => 5,
            ],
            [
                'name' => 'Flower Gift Box Premium',
                'description' => 'Luxury flower gift box.',
                'price' => 49.90,
                'stock' => 6,
                'image' => 'products/gift_box.jpg',
                'category_id' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
