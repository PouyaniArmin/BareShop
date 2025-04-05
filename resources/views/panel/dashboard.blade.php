@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dashboard</h2>

  <!-- Overview Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Card 1: Total Sales -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-lg font-semibold text-gray-800">Total Sales</h3>
      <p class="text-2xl font-bold text-gray-800">$12,350</p>
    </div>
    
    <!-- Card 2: Products in Stock -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-lg font-semibold text-gray-800">Products in Stock</h3>
      <p class="text-2xl font-bold text-gray-800">120</p>
    </div>
    
    <!-- Card 3: Pending Orders -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-lg font-semibold text-gray-800">Pending Orders</h3>
      <p class="text-2xl font-bold text-gray-800">8</p>
    </div>
  </div>

  <!-- Recent Orders Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Order ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Customer</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Total</th>
          <th class="px-4 py-2 text-sm text-gray-600">Date</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1234</td>
          <td class="px-4 py-2 text-sm text-gray-700">John Doe</td>
          <td class="px-4 py-2 text-sm text-gray-700">Shipped</td>
          <td class="px-4 py-2 text-sm text-gray-700">$250.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-01</td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1235</td>
          <td class="px-4 py-2 text-sm text-gray-700">Jane Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">Processing</td>
          <td class="px-4 py-2 text-sm text-gray-700">$120.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-02</td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1236</td>
          <td class="px-4 py-2 text-sm text-gray-700">Robert Brown</td>
          <td class="px-4 py-2 text-sm text-gray-700">Delivered</td>
          <td class="px-4 py-2 text-sm text-gray-700">$315.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-03</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

@endsection