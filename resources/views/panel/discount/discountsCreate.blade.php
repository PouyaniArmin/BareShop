@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Discount</h2>

  <form action="{{ route('discount.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
    @csrf

    <!-- Product Select -->
    <div class="mb-4">
      <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Product</label>
      <select name="product_id" id="product_id" required class="w-full px-4 py-2 border rounded-md">
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Type -->
    <div class="mb-4">
      <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Discount Type</label>
      <select name="type" id="type" required class="w-full px-4 py-2 border rounded-md">
        <option value="percentage" {{ old('type', $discount->type ?? 'percentage') == 'percentage' ? 'selected' : '' }}>Percentage</option>
        <option value="fixed" {{ old('type', $discount->type ?? 'percentage') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
      </select>

    </div>


    <!-- Value -->
    <div class="mb-4">
      <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Discount Value</label>
      <input type="number" name="value" id="value" step="0.01" required
        class="w-full px-4 py-2 border rounded-md">
    </div>

    <!-- Start Date -->
    <div class="mb-4">
      <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
      <input type="datetime-local" name="start_date" id="start_date" required
        class="w-full px-4 py-2 border rounded-md">
    </div>

    <!-- End Date -->
    <div class="mb-4">
      <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
      <input type="datetime-local" name="end_date" id="end_date" required
        class="w-full px-4 py-2 border rounded-md">
    </div>

    <!-- Is Active -->
    <div class="mb-4">
      <label class="flex items-center space-x-2">
        <input type="checkbox" name="is_active" value="1" checked class="form-checkbox">
        <span class="text-sm text-gray-700">Is Active</span>
      </label>
    </div>

    <div class="flex justify-end">
      <a href="{{ route('discount.index') }}" class="px-4 py-2 mr-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Create Discount</button>
    </div>
  </form>
</main>
@endsection