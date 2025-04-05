@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Payments Management</h2>

  <!-- Payments Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Payments List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Payment ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">User</th>
          <th class="px-4 py-2 text-sm text-gray-600">Amount</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#5001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Alice Johnson</td>
          <td class="px-4 py-2 text-sm text-gray-700">$120.00</td>
          <td class="px-4 py-2 text-sm text-green-600">Completed</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-05</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</button>
            <button class="ml-2 px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline">
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</button>
            </form>
          </td>
        </tr>

        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#5002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bob Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">$85.50</td>
          <td class="px-4 py-2 text-sm text-yellow-600">Pending</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-04-04</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">View</button>
            <button class="ml-2 px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form method="POST" class="inline">
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6 flex justify-end">
      <nav class="inline-flex">
        <a href="#" class="px-3 py-1 border border-gray-300 rounded-l-md text-sm text-gray-700 hover:bg-gray-200">Prev</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 text-sm text-gray-700 hover:bg-gray-200">1</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 text-sm text-gray-700 hover:bg-gray-200">2</a>
        <a href="#" class="px-3 py-1 border border-gray-300 rounded-r-md text-sm text-gray-700 hover:bg-gray-200">Next</a>
      </nav>
    </div>
  </div>
</main>

@endsection