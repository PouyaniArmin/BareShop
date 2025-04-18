<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'T-Shirts',
                'description' => 'Various T-shirts in different styles',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shoes',
                'description' => 'Fashionable shoes for all occasions',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessories',
                'description' => 'Jewelry, watches, and other accessories',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
