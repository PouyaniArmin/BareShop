@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Order - #ORD-1001</h2>

  <!-- Edit Order Form -->
  <form class="bg-white p-6 rounded-lg shadow-md space-y-6">
    
    <!-- Customer Information -->
    <div>
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label for="customer-name" class="block text-sm font-medium text-gray-600">Customer Name</label>
          <input type="text" id="customer-name" name="customer_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="Alice Johnson" />
        </div>
        <div>
          <label for="customer-email" class="block text-sm font-medium text-gray-600">Customer Email</label>
          <input type="email" id="customer-email" name="customer_email" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="alice@example.com" />
        </div>
      </div>
    </div>

    <!-- Order Information -->
    <div>
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Information</h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label for="order-status" class="block text-sm font-medium text-gray-600">Order Status</label>
          <select id="order-status" name="order_status" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            <option value="processing" selected>Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>
        <div>
          <label for="payment-status" class="block text-sm font-medium text-gray-600">Payment Status</label>
          <select id="payment-status" name="payment_status" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            <option value="paid" selected>Paid</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Shipping Information -->
    <div>
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Information</h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label for="shipping-address" class="block text-sm font-medium text-gray-600">Shipping Address</label>
          <input type="text" id="shipping-address" name="shipping_address" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="123 Main St, Cityville" />
        </div>
        <div>
          <label for="tracking-number" class="block text-sm font-medium text-gray-600">Tracking Number</label>
          <input type="text" id="tracking-number" name="tracking_number" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="1234567890" />
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end space-x-4">
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save Changes</button>
      <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">Cancel</button>
    </div>
  </form>
</main>

@endsection