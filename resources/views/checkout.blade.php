@extends('layouts.mainLayout')
@section('title', 'Checkout')
@section('content')

<section class="py-10 px-4 max-w-4xl mx-auto text-gray-700">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>

    @guest
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            You need to <a href="{{ route('login') }}" class="underline">login</a> to proceed with checkout.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Shipping Address Form -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Shipping Information</h3>
                <form method="post" action="{{route('checkout.store')}}">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Address Line 1</label>
                        <input type="text" name="address_line1" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Address Line 2</label>
                        <input type="text" name="address_line2" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">City</label>
                        <input type="text" name="city" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">State</label>
                        <input type="text" name="state" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Postal Code</label>
                        <input type="text" name="postal_code" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Country</label>
                        <input type="text" name="country" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Payment Method</label>
                        <select name="payment_method" class="w-full border rounded px-3 py-2" required>
                            <option value="online">Online</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Place Order
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Order Summary</h3>
                <div class="bg-white rounded shadow p-4 space-y-4">
                    @foreach ($cart as $item)
                        <div class="flex justify-between border-b pb-2">
                            <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                            <span>RM {{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                    @endforeach
                    <div class="flex justify-between font-bold pt-2">
                        <span>Total:</span>
                        <span>RM {{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endguest
</section>

@endsection
