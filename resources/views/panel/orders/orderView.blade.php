@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Details - #ORD-1001</h2>

  <!-- Order Information -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Information</h3>
    <div class="grid grid-cols-2 gap-4">
      <div><strong>Customer:</strong> Alice Johnson</div>
      <div><strong>Order ID:</strong> #ORD-1001</div>
      <div><strong>Total Amount:</strong> $129.99</div>
      <div><strong>Order Date:</strong> 2025-04-01</div>
      <div><strong>Status:</strong> Processing</div>
      <div><strong>Payment Status:</strong> Paid</div>
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
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">Product 1</td>
          <td class="px-4 py-2 text-sm text-gray-700">2</td>
          <td class="px-4 py-2 text-sm text-gray-700">$50.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">$100.00</td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">Product 2</td>
          <td class="px-4 py-2 text-sm text-gray-700">1</td>
          <td class="px-4 py-2 text-sm text-gray-700">$29.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">$29.99</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Shipping Information -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Information</h3>
    <div class="grid grid-cols-2 gap-4">
      <div><strong>Shipping Address:</strong> 123 Main St, Cityville</div>
      <div><strong>Shipping Method:</strong> Standard Shipping</div>
      <div><strong>Tracking Number:</strong> 1234567890</div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="flex justify-end space-x-4">
    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit Order</button>
    <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel Order</button>
  </div>
</main>

@endsection