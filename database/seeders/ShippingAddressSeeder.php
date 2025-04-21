<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shipping_addresses')->insert([
            [
                'order_id' => 1,  // Order ID from orders table
                'address_line1' => '123 Main St',
                'address_line2' => 'Apt 101',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10001',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,  // Order ID from orders table
                'address_line1' => '456 Elm St',
                'address_line2' => 'Suite 202',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal_code' => '90001',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
