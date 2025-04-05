@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order Management</h2>

  <!-- Search Section -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search orders..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
  </div>

  <!-- Orders Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Orders List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Order ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Customer</th>
          <th class="px-4 py-2 text-sm text-gray-600">Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">Total</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Order 1 -->
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Alice Johnson</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-01</td>
          <td class="px-4 py-2 text-sm text-gray-700">$120.50</td>
          <td class="px-4 py-2 text-sm text-gray-700">Pending</td>
          <td class="px-4 py-2 text-sm text-gray-700 space-x-1">
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</button>
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block">
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <!-- Order 2 -->
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bob Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-03</td>
          <td class="px-4 py-2 text-sm text-gray-700">$89.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">Shipped</td>
          <td class="px-4 py-2 text-sm text-gray-700 space-x-1">
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</button>
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block">
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <!-- Order 3 -->
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD1003</td>
          <td class="px-4 py-2 text-sm text-gray-700">Charlie Brown</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-05</td>
          <td class="px-4 py-2 text-sm text-gray-700">$45.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">Delivered</td>
          <td class="px-4 py-2 text-sm text-gray-700 space-x-1">
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</button>
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block">
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4 flex justify-end">
      <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
        <a href="#" class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-l hover:bg-gray-100">Previous</a>
        <a href="#" class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-gray-300 hover:bg-gray-100">1</a>
        <a href="#" class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-gray-300 hover:bg-gray-100">2</a>
        <a href="#" class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-r hover:bg-gray-100">Next</a>
      </nav>
    </div>
  </div>
</main>

@endsection