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
    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New Discount</button>
  </div>

  <!-- Discounts List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Discounts List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Discount ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Discount Code</th>
          <th class="px-4 py-2 text-sm text-gray-600">Discount Percentage</th>
          <th class="px-4 py-2 text-sm text-gray-600">Expiry Date</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">SUMMER21</td>
          <td class="px-4 py-2 text-sm text-gray-700">20%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-06-30</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form action="#" method="POST" class="inline-block">
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">WINTER25</td>
          <td class="px-4 py-2 text-sm text-gray-700">15%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-12-31</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form action="#" method="POST" class="inline-block">
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1003</td>
          <td class="px-4 py-2 text-sm text-gray-700">FALL22</td>
          <td class="px-4 py-2 text-sm text-gray-700">30%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2025-09-30</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <form action="#" method="POST" class="inline-block">
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex justify-center">
    <nav class="inline-flex">
      <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-l-md hover:bg-gray-400">Previous</button>
      <button class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400">1</button>
      <button class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400">2</button>
      <button class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400">3</button>
      <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-r-md hover:bg-gray-400">Next</button>
    </nav>
  </div>
</main>

@endsection