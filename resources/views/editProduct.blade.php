@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>

  <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl">
    <form method="POST" enctype="multipart/form-data">
      <!-- Product Name -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Product Name</label>
        <input type="text" value="Classic T-Shirt" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Description</label>
        <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4">A comfortable and stylish t-shirt.</textarea>
      </div>

      <!-- Price -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Price ($)</label>
        <input type="number" value="29.99" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Category -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Category</label>
        <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="1" selected>T-Shirts</option>
          <option value="2">Shoes</option>
          <option value="3">Accessories</option>
        </select>
      </div>

      <!-- Stock -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Stock Quantity</label>
        <input type="number" value="150" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Image Upload -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Product Image</label>
        <input type="file" class="w-full">
      </div>

      <!-- Status -->
      <div class="mb-4">
        <label class="inline-flex items-center">
          <input type="checkbox" checked class="form-checkbox text-blue-600">
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- Discount -->
      <div class="mb-6">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Discount (%)</label>
        <input type="number" value="10" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Buttons -->
      <div class="flex justify-end">
        <button type="button" class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Product</button>
      </div>
    </form>
  </div>
</main>

@endsection