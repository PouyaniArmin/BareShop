@extends('layouts.mainLayout')

@section('title', 'Payment Success')

@section('content')
<div class="py-20 text-center">
    <h2 class="text-4xl font-semibold mb-4">Payment Successful!</h2>
    <p class="text-lg">Your payment has been successfully processed.</p>
    <p class="mt-4">You will receive an email confirmation with your order details shortly.</p>
    <a href="/" class="text-blue-600 mt-6 inline-block">Back to Home</a>
</div>
@endsection
