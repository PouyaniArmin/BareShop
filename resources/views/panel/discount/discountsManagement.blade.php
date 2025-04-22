@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Discounts Management</h2>

  <!-- Search and Add Discount -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search discounts..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <a href="{{ route('discount.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New Discount</a>
  </div>

  <!-- Discounts List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Discounts List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Product</th>
          <th class="px-4 py-2 text-sm text-gray-600">Type</th>
          <th class="px-4 py-2 text-sm text-gray-600">Value</th>
          <th class="px-4 py-2 text-sm text-gray-600">Start Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">End Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($discounts as $discount)
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#{{ $discount->id }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ $discount->product->title ?? 'N/A' }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ ucfirst($discount->type) }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ $discount->value }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ \Carbon\Carbon::parse($discount->start_date)->format('Y-m-d') }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ \Carbon\Carbon::parse($discount->end_date)->format('Y-m-d') }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <span class="inline-block px-2 py-1 text-xs {{ $discount->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded">
              {{ $discount->is_active ? 'Active' : 'Inactive' }}
            </span>
          </td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <a href="{{ route('discount.edit', $discount->id) }}" class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</a>
            <form action="{{ route('discount.destroy', $discount->id) }}" method="POST" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex justify-center">
    {{ $discounts->links() }}
  </div>
</main>
@endsection
