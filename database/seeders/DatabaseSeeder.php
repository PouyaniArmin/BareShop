<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use App\Models\ShippingAddress;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ShippingAddressSeeder::class);
        $this->call(OrderItemSeeder::class);
    }
}
