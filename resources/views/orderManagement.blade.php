@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Management</h2>

  <!-- Orders List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Orders List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Order ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Customer</th>
          <th class="px-4 py-2 text-sm text-gray-600">Total</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD-1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Alice Johnson</td>
          <td class="px-4 py-2 text-sm text-gray-700">$129.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">Processing</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-01</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">View</button>
            <form method="POST" class="inline-block ml-2">
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD-1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bob Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">$89.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">Shipped</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-03</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">View</button>
            <form method="POST" class="inline-block ml-2">
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6 flex justify-end">
      <nav class="inline-flex shadow-sm rounded-md" aria-label="Pagination">
        <a href="#" class="px-3 py-2 bg-white text-sm border border-gray-300 rounded-l-md hover:bg-gray-100">Previous</a>
        <a href="#" class="px-3 py-2 bg-white text-sm border-t border-b border-gray-300 hover:bg-gray-100">1</a>
        <a href="#" class="px-3 py-2 bg-white text-sm border-t border-b border-gray-300 hover:bg-gray-100">2</a>
        <a href="#" class="px-3 py-2 bg-white text-sm border-t border-b border-gray-300 hover:bg-gray-100">3</a>
        <a href="#" class="px-3 py-2 bg-white text-sm border border-gray-300 rounded-r-md hover:bg-gray-100">Next</a>
      </nav>
    </div>
  </div>
</main>

@endsection