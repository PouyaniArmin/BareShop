<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ShippingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order1 = Order::create([
            'user_id' => 1,
            'total_price' => 39.98,
            'status' => 'pending',
            'payment_method' => 'credit_card',
            'order_date' => now(),
        ]);
        $order1->orderItems()->create([
            'product_id' => 1,
            'quantity' => 2,
            'price' => 19.99,
        ]);
        $order2 = Order::create([
            'user_id' => 1,
            'total_price' => 59.99,
            'status' => 'completed',
            'payment_method' => 'paypal',
            'order_date' => now(),
        ]);
    
        $order2->orderItems()->create([
            'product_id' => 2,
            'quantity' => 1,
            'price' => 59.99,]);
    }
}
