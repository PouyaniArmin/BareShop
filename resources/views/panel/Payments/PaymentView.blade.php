@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">View Payment</h2>

  <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">Payment ID:</label>
      <p class="text-gray-800">#5001</p>
    </div>

    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">User:</label>
      <p class="text-gray-800">Alice Johnson</p>
    </div>

    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">Amount:</label>
      <p class="text-gray-800">$120.00</p>
    </div>

    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
      <p class="text-green-600">Completed</p>
    </div>

    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">Payment Date:</label>
      <p class="text-gray-800">2025-04-05</p>
    </div>

    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2">Payment Method:</label>
      <p class="text-gray-800">Credit Card</p>
    </div>

    <div>
      <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Back to Payments</a>
    </div>
  </div>
</main>

@endsection
