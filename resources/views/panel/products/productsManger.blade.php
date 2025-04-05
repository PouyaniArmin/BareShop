@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Product Management</h2>

  <!-- Product Search and Add Button -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search products..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New Product</button>
  </div>

  <!-- Product List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Products List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Product ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Name</th>
          <th class="px-4 py-2 text-sm text-gray-600">Category</th>
          <th class="px-4 py-2 text-sm text-gray-600">Price</th>
          <th class="px-4 py-2 text-sm text-gray-600">Stock</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Minimal Backpack</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bags</td>
          <td class="px-4 py-2 text-sm text-gray-700">$39.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">12</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block ml-2">
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Simple Sneakers</td>
          <td class="px-4 py-2 text-sm text-gray-700">Shoes</td>
          <td class="px-4 py-2 text-sm text-gray-700">$59.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">30</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block ml-2">
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2003</td>
          <td class="px-4 py-2 text-sm text-gray-700">Casual T-Shirt</td>
          <td class="px-4 py-2 text-sm text-gray-700">Clothing</td>
          <td class="px-4 py-2 text-sm text-gray-700">$19.50</td>
          <td class="px-4 py-2 text-sm text-gray-700">50</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline-block ml-2">
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-end mt-6">
      <nav class="inline-flex rounded-md shadow-sm">
        <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">Previous</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">1</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">2</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">3</a>
        <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">Next</a>
      </nav>
    </div>
  </div>
</main>
@endsection