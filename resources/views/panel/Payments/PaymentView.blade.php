@extends('layouts.dashboardLayout')
@section('content')
<div class="container mx-auto py-4">
  <h1 class="text-2xl font-bold mb-4">Payments List</h1>

  <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead>
      <tr>
        <th class="py-2 px-4 border-b text-left">Payment ID</th>
        <th class="py-2 px-4 border-b text-left">Amount</th>
        <th class="py-2 px-4 border-b text-left">Status</th>
        <th class="py-2 px-4 border-b text-left">Payment Method</th>
        <th class="py-2 px-4 border-b text-left">Paid At</th>
        <th class="py-2 px-4 border-b text-left">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($payments as $payment)
      <tr>
        <td class="py-2 px-4 border-b">{{ $payment->id }}</td>
        <td class="py-2 px-4 border-b">{{ number_format($payment->amount) }} Toman</td>
        <td class="py-2 px-4 border-b">
          <span class="text-{{ $payment->status === 'paid' ? 'green' : 'red' }}-500 font-semibold">
            {{ ucfirst($payment->status) }}
          </span>
        </td>
        <td class="py-2 px-4 border-b">{{ ucfirst($payment->method) }}</td>
        
        <td class="py-2 px-4 border-b">
          <a href="#" class="text-blue-500">View</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @if($payments->isEmpty())
  <p class="text-center py-4">No payments available.</p>
  @endif
</div>@endsection