<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Basic White T-shirt',
                'description' => 'A simple white T-shirt for everyday wear.',
                'price' => 19.99,
                'stock' => 100,
                'discount' => 5.00,
                'is_active' => true,
                'category_id' => 1, // T-Shirts category
                'seller_id' => 1,   // Assuming seller_id 1 is a valid user
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Comfortable running shoes for all types of sports.',
                'price' => 59.99,
                'stock' => 50,
                'discount' => 10.00,
                'is_active' => true,
                'category_id' => 2, // Shoes category
                'seller_id' => 1,   // Assuming seller_id 1 is a valid user
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
