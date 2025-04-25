@extends('layouts.mainLayout')
@section('title', 'All Products - Store')
@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<section class="h-screen bg-gray-100 px-4 text-gray-600 antialiased" x-data="app">
    <div class="flex h-full flex-col justify-center">
        <!-- Table -->
        <div class="mx-auto w-full max-w-2xl rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4">
                <div class="font-semibold text-gray-800">Manage Carts</div>
            </header>

            <div class="overflow-x-auto p-3">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            <th></th>
                            <th class="p-2 text-left font-semibold">Product Name</th>
                            <th class="p-2 text-left font-semibold">Quantity</th>
                            <th class="p-2 text-left font-semibold">Total</th>
                            <th class="p-2 text-center font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($cart as $id => $item)
                        <tr>
                            <td class="p-2">
                                <input type="checkbox" class="h-5 w-5" value="{{ $id }}" @click="toggleCheckbox($el, {{ $item['price'] }})" />
                            </td>
                            <td class="p-2">
                                <div class="font-medium text-gray-800">{{ $item['name'] }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-left">{{ $item['quantity'] }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">RM {{ number_format($item['price'], 2) }}</div>
                            </td>
                            <td class="p-2">
                                <div class="flex justify-center">
                                    <button @click="removeItem({{ $id }})">
                                        <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- total + checkout -->
            <form method="post" action="{{ route('checkout.page') }}">
                @csrf
                <input type="hidden" name="selected" :value="JSON.stringify(selected)" />
                <div class="flex items-center justify-between border-t border-gray-100 px-5 py-4">
                    <div class="flex items-center space-x-2 text-xl font-bold">
                        <span>Total:</span>
                        <span class="text-blue-600">RM <span x-text="total.toFixed(2)"></span></span>
                    </div>
                    <button type="submit"
                        class="rounded-md bg-blue-600 px-6 py-2 text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                        Checkout
                    </button>
                </div>
            </form>

            <!-- hidden input -->
            <div class="flex justify-end">
                <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("app", () => ({
            total: 0,
            selected: [],
            removeItem(itemId) {
                fetch(`/cart/remove/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            },

            updateTotal() {
                this.total = Object.values(this.cart).reduce((sum, item) => sum + item.price * item.quantity, 0);
            },

            toggleCheckbox(element, amount) {
                if (element.checked) {
                    this.selected.push(element.value);
                    this.total += amount;
                } else {
                    const index = this.selected.indexOf(element.value);
                    if (index > -1) this.selected.splice(index, 1);
                    this.total -= amount;
                }
            },
        }));
    });
</script>
@endsection
