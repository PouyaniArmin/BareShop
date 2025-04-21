<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,  // Product ID from products table
                'image_path' => 'images/products/o.png',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,  // Product ID from products table
                'image_path' => 'images/products/a.png',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
