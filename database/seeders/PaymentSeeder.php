<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order1 = Order::find(1); 
        Payment::create([
            'order_id' => $order1->id,
            'amount' => $order1->total_price,
            'status' => 'pending',
            'method' => 'credit_card',
            'paid_at' => null, 
        ]);
        $order2 = Order::find(2);
        Payment::create([
            'order_id' => $order2->id,
            'amount' => $order2->total_price,
            'status' => 'paid', 
            'paid_at' => now(),
        ]);
    }
}
