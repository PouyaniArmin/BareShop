@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Payments Management</h2>

  <!-- Payment Search and Add New Payment Button -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search payments..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New Payment</button>
  </div>

  <!-- Payment List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Payments List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Payment ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Order ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Customer Name</th>
          <th class="px-4 py-2 text-sm text-gray-600">Amount</th>
          <th class="px-4 py-2 text-sm text-gray-600">Payment Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Payment Method</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#5001</td>
          <td class="px-4 py-2 text-sm text-gray-700">#1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">John Doe</td>
          <td class="px-4 py-2 text-sm text-gray-700">$150.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">Completed</td>
          <td class="px-4 py-2 text-sm text-gray-700">Credit Card</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">View</button>
            <button class="ml-2 px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</button>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#5002</td>
          <td class="px-4 py-2 text-sm text-gray-700">#1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Jane Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">$80.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">Pending</td>
          <td class="px-4 py-2 text-sm text-gray-700">PayPal</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">View</button>
            <button class="ml-2 px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</button>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#5003</td>
          <td class="px-4 py-2 text-sm text-gray-700">#1003</td>
          <td class="px-4 py-2 text-sm text-gray-700">Robert Brown</td>
          <td class="px-4 py-2 text-sm text-gray-700">$200.00</td>
          <td class="px-4 py-2 text-sm text-gray-700">Completed</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bank Transfer</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">View</button>
            <button class="ml-2 px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

@endsection