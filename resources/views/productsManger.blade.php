@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Product Management</h2>

  <!-- Product Search and Add Product Button -->
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
          <th class="px-4 py-2 text-sm text-gray-600">Stock Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Laptop</td>
          <td class="px-4 py-2 text-sm text-gray-700">Electronics</td>
          <td class="px-4 py-2 text-sm text-gray-700">$999.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">In Stock</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Smartphone</td>
          <td class="px-4 py-2 text-sm text-gray-700">Electronics</td>
          <td class="px-4 py-2 text-sm text-gray-700">$799.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">Out of Stock</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#2003</td>
          <td class="px-4 py-2 text-sm text-gray-700">Headphones</td>
          <td class="px-4 py-2 text-sm text-gray-700">Electronics</td>
          <td class="px-4 py-2 text-sm text-gray-700">$199.99</td>
          <td class="px-4 py-2 text-sm text-gray-700">In Stock</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection