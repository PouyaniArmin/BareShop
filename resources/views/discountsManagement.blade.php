@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Discounts Management</h2>

  <!-- Discount Search and Add New Discount Button -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Search discounts..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">Search</button>
    </div>
    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">Add New Discount</button>
  </div>

  <!-- Discounts List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Discounts List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Discount ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Code</th>
          <th class="px-4 py-2 text-sm text-gray-600">Description</th>
          <th class="px-4 py-2 text-sm text-gray-600">Discount Percentage</th>
          <th class="px-4 py-2 text-sm text-gray-600">Valid From</th>
          <th class="px-4 py-2 text-sm text-gray-600">Valid Until</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">SUMMER21</td>
          <td class="px-4 py-2 text-sm text-gray-700">Summer Sale Discount</td>
          <td class="px-4 py-2 text-sm text-gray-700">15%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-06-01</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-09-01</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <div class="flex space-x-2">
              <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 text-xs">View</button>
              <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">Delete</button>
            </div>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">WINTER21</td>
          <td class="px-4 py-2 text-sm text-gray-700">Winter Holiday Discount</td>
          <td class="px-4 py-2 text-sm text-gray-700">20%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-12-01</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-12-31</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <div class="flex space-x-2">
              <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 text-xs">View</button>
              <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">Delete</button>
            </div>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#D1003</td>
          <td class="px-4 py-2 text-sm text-gray-700">BLACKFRIDAY</td>
          <td class="px-4 py-2 text-sm text-gray-700">Black Friday Discount</td>
          <td class="px-4 py-2 text-sm text-gray-700">25%</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-11-26</td>
          <td class="px-4 py-2 text-sm text-gray-700">2021-11-30</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <div class="flex space-x-2">
              <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 text-xs">View</button>
              <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

@endsection