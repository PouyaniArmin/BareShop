@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order Management</h2>

  <!-- Search + Create Section -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center space-x-4">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search orders..." />
      <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <!-- Create Order button with text first and + icon at the end -->
    <a href="{{ route('order.create') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
      Create Order <i class="fa fa-plus-circle ml-2"></i>
    </a>
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
        @foreach ($orders as $order)
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#ORD{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ $order->user->name ?? 'N/A' }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ $order->created_at->format('Y-m-d') }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">${{ number_format($order->total_price, 2) }}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{ ucfirst($order->status) }}</td>
          <td class="px-4 py-2 text-sm text-gray-700 space-x-1">
            <a href="{{ route('order.show', $order->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</a>
            <a href="{{ route('order.edit', $order->id) }}" class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</a>
            <form method="POST" action="{{ route('order.destroy', $order->id) }}" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Pagination --}}
    {{-- <div class="mt-4 flex justify-end">
      {{ $orders->links() }}
    </div> --}}
  </div>
</main>
@endsection
