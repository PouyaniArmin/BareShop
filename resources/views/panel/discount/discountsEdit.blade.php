@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Discount</h2>

  <div class="bg-white p-6 rounded-lg shadow-md">
    <form action="{{ route('discount.update', $discount->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Product Select -->
      <div>
        <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
        <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
          @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ $discount->product_id == $product->id ? 'selected' : '' }}>
              {{ $product->name }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Type Select -->
      <div>
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
          <option value="percentage" {{ $discount->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
          <option value="fixed" {{ $discount->type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
        </select>
      </div>

      <!-- Value -->
      <div>
        <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
        <input type="number" name="value" id="value" value="{{ $discount->value }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
      </div>

      <!-- Start Date -->
      <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="start_date" id="start_date" value="{{ \Carbon\Carbon::parse($discount->start_date)->format('Y-m-d') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

      </div>

      <!-- End Date -->
      <div>
        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
        <input type="date" name="end_date" id="end_date" value="{{ \Carbon\Carbon::parse($discount->end_date)->format('Y-m-d') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

      </div>

      <!-- Status -->
      <div>
        <label for="is_active" class="block text-sm font-medium text-gray-700">Active</label>
        <select name="is_active" id="is_active" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
          <option value="1" {{ $discount->is_active ? 'selected' : '' }}>Yes</option>
          <option value="0" {{ !$discount->is_active ? 'selected' : '' }}>No</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="pt-4">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Discount</button>
      </div>
    </form>
  </div>
</main>
@endsection
