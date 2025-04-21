<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::all();
        return view('panel/orders/orderManagement', compact('user', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $users = User::all();
        $products = Product::all();
        return view('panel/orders/createOrder', compact('user', 'users', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric|min:0',
            'order_items' => 'required|array|min:1',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|integer|min:1',
            'order_items.*.price' => 'required|numeric|min:0',
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'order_date' => now(),
        ]);

        foreach ($request->order_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        ShippingAddress::create([
            'order_id' => $order->id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        return redirect('dashboard/order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $order = Order::with(['user', 'orderItems.product', 'shippingAddress'])->findOrFail($id);
        return view('panel/orders/orderView', compact('user', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $user = Auth::user();
        $order->load('orderItems', 'shippingAddress');
        $products = Product::all();
        return view('panel/orders/editOrder', compact('user', 'order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'payment_method' => 'required|string',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|integer|min:1',
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        $order->update([
            'payment_method' => $request->payment_method,
            'total_price' => collect($request->order_items)->sum(function ($item) {
                $product = Product::find($item['product_id']);
                return $product->price * $item['quantity'];
            }),
        ]);

        // Update Shipping Address
        $order->shippingAddress()->update([
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        // Delete old order items
        $order->orderItems()->delete();

        // Create new order items
        foreach ($request->order_items as $item) {
            $product = Product::find($item['product_id']);
            $order->orderItems()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);
        }

        return redirect('dashboard/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->orderItems()->delete();
        $order->shippingAddress()->delete();
        $order->delete();

        return redirect('dashboard/order');
    }
}
