<!-- resources/views/checkout/success.blade.php -->
@extends('layouts.mainLayout')

@section('title', 'Order Success')

@section('content')
<div class="py-20 text-center">
    <h2 class="text-4xl font-semibold mb-4">Thank You for Your Order!</h2>
    <p class="text-lg">Your order has been successfully placed.</p>
    <p class="mt-4">You will receive an email confirmation shortly.</p>
    <a href="{{ route('home') }}" class="text-blue-600 mt-6 inline-block">Back to Home</a>
</div>
@endsection
