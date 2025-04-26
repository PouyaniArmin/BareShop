<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\File\ASN1\Maps\EcdsaSigValue;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        return view('checkout', compact('cart', 'total'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'payment_method' => 'required|string',
        ]);
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);
        ShippingAddress::create([
            'order_id' => $order->id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Payment::create([
            'order_id' => $order->id,
            'amount' => $total,
            'status' => 'pending',
            'method' => $request->payment_method,
        ]);

        session()->forget('cart');

        return redirect()->route('checkout.confirm', ['orderId' => $order->id]);
    }
    public function confirmPayment($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('payment-confirmation', compact('order'));
    }
    
    public function confirmPaymentStore($orderId){
        $order = Order::findOrFail($orderId);
        $order->status = 'paid';
        $order->save();
        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'status' => 'completed',
            'method' => $order->payment_method,
            'transaction_id' => 'some-transaction-id', 
            'paid_at' => now(),
        ]);
        return redirect()->route('checkout.success');
    }
    public function success()
    {
        return view('success');
    }
}
