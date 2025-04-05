@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Discount</h2>

  <!-- Create Discount Form -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <form action="#" method="POST">
      @csrf
      <!-- Discount Code -->
      <div class="mb-4">
        <label for="discount_code" class="block text-sm font-medium text-gray-700">Discount Code</label>
        <input type="text" id="discount_code" name="discount_code" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter discount code" required />
      </div>

      <!-- Discount Percentage -->
      <div class="mb-4">
        <label for="discount_percentage" class="block text-sm font-medium text-gray-700">Discount Percentage</label>
        <input type="number" id="discount_percentage" name="discount_percentage" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter discount percentage" required min="1" max="100"/>
      </div>

      <!-- Expiry Date -->
      <div class="mb-4">
        <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
        <input type="date" id="expiry_date" name="expiry_date" class="mt-1 px-4 py-2 w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Submit Button -->
      <div class="mb-4 flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Discount</button>
      </div>
    </form>
  </div>
</main>

@endsection