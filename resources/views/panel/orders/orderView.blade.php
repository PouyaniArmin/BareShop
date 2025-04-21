@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Details - #ORD-{{ $order->id }}</h2>

  <!-- Order Information -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Information</h3>
    <div class="grid grid-cols-2 gap-4">
      <div><strong>Customer:</strong> {{ $order->user->name }}</div>
      <div><strong>Order ID:</strong> #ORD-{{ $order->id }}</div>
      <div><strong>Total Amount:</strong> ${{ number_format($order->total_price, 2) }}</div>
      <div><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</div>
      <div><strong>Status:</strong> {{ ucfirst($order->status) }}</div>
      <div><strong>Payment Status:</strong> {{ ucfirst($order->status) }}</div>
    </div>
  </div>

  <!-- Products in the Order -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ordered Products</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Product Name</th>
          <th class="px-4 py-2 text-sm text-gray-600">Quantity</th>
          <th class="px-4 py-2 text-sm text-gray-600">Price</th>
          <th class="px-4 py-2 text-sm text-gray-600">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->orderItems as $item)
          <tr class="border-b">
            <td class="px-4 py-2 text-sm text-gray-700">{{ $item->product->name }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $item->quantity }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">${{ number_format($item->product->price, 2) }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">${{ number_format($item->quantity * $item->product->price, 2) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Shipping Information -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Information</h3>
    <div class="grid grid-cols-2 gap-4">
      <div><strong>Shipping Address:</strong> {{ $order->shippingAddress->address_line1 }}, {{ $order->shippingAddress->city }}</div>
      <div><strong>Shipping Method:</strong> {{ $order->shippingAddress->shipping_method ?? 'Standard Shipping' }}</div>
      <div><strong>Tracking Number:</strong> {{ $order->shippingAddress->tracking_number ?? 'N/A' }}</div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="flex justify-end space-x-4">
    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit Order</button>
    <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel Order</button>
  </div>
</main>
@endsection
