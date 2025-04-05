@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Payment</h2>

  <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    <form method="POST">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-semibold mb-2">User</label>
        <input type="text" name="user" value="Alice Johnson" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-semibold mb-2">Amount</label>
        <input type="text" name="amount" value="120.00" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-semibold mb-2">Status</label>
        <select name="status" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option selected>Completed</option>
          <option>Pending</option>
          <option>Failed</option>
        </select>
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">Payment Date</label>
        <input type="date" name="payment_date" value="2025-04-01" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Payment</button>
      </div>
    </form>
  </div>
</main>

@endsection
