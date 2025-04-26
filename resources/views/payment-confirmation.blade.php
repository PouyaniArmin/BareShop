@extends('layouts.mainLayout')
@section('title', 'Payment Confirmation')
@section('content')

<section class="py-10 px-4 max-w-4xl mx-auto text-gray-700">
    <h2 class="text-2xl font-bold mb-6">Confirm Your Payment</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-4">Order Summary</h3>
        <div class="space-y-4">
            <div>
                <strong>Order ID:</strong> {{ $order->id }}
            </div>
            <div>
                <strong>Total Price:</strong> RM {{ number_format($order->total_price, 2) }}
            </div>
            <div>
                <strong>Payment Method:</strong> {{ $order->payment_method }}
            </div>
            <div>
                <strong>Shipping Address:</strong> {{ $order->shippingAddress->address_line1 }}
            </div>
            <div>
                <strong>Status:</strong> {{ $order->status }}
            </div>
        </div>

        <form action="{{ route('checkoutPayment.store', ['orderId' => $order->id]) }}" method="post" class="mt-6">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Confirm Payment
            </button>
        </form>
    </div>
</section>

@endsection
