<?php

namespace Database\Seeders;

use App\Models\Product;
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
                'name' => 'Apple Macbook Pro 16',        
                'details' => 'Apple M1 Pro, 16 GPU, 512GB SSD',        
                'description' => 'Behold an entirely new class of GPU architecture. And the biggest breakthrough in graphics yet for Apple silicon. Dynamic Caching optimizes fast on-chip memory to dramatically increase average GPU utilization — driving a huge performance boost for the most demanding pro apps and games.',        
                'brand' => 'Apple',        
                'price' => 2499,        
                'shipping_cost' => 25,        
                'image_path' => 'storage/product.png',        
            ],
            [
                'name' => 'Samsung Galaxy Book Pro',        
                'details' => '13.3inch, 16 GPU, 512GB SSD',        
                'description' => 'Create without boundaries using our most powerful Intel processor series and the latest NVIDIA® GeForce RTX™ graphics card. Whether rendering video, gaming or coding, Galaxy Book3 Ultra gives you all-out power and speed. When its time to save your creations, up to 1TB of built-in storage and 2TB of expandable storage make space for every frame.4, 5',        
                'brand' => 'Samsung',        
                'price' => 1400,        
                'shipping_cost' => 25,        
                'image_path' => 'storage/product2.png',        
            ]
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
