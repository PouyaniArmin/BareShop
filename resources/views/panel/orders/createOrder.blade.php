@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create Order</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <!-- Order Information -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Information</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
                <div>
                    <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                    <input type="text" name="total_price" id="total_price" value="0.00" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly />
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h3>
            <div id="order-items">
                <div class="order-item flex items-center mb-4">
                    <select name="order_items[0][product_id]" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" onchange="updatePrice(this)">
                        <option value="" disabled selected>Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="order_items[0][quantity]" placeholder="Quantity" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" required onchange="updatePrice(this)" />
                    <input type="text" name="order_items[0][price]" placeholder="Price" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" readonly />
                </div>
            </div>
            <button type="button" onclick="addProduct()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mt-4">Add Product</button>
        </div>

        <!-- Shipping Information -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Information</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="address_line1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                    <input type="text" name="address_line1" id="address_line1" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>
                <div>
                    <label for="address_line2" class="block text-sm font-medium text-gray-700">Address Line 2 (optional)</label>
                    <input type="text" name="address_line2" id="address_line2" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <input type="text" name="state" id="state" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>
                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" id="country" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>
            </div>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Submit Order</button>
    </form>
</main>
@endsection

<script>
    let productIndex = 1;

    function addProduct() {
        const newProduct = `
            <div class="order-item flex items-center mb-4">
                <select name="order_items[${productIndex}][product_id]" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" onchange="updatePrice(this)">
                    <option value="" disabled selected>Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <input type="number" name="order_items[${productIndex}][quantity]" placeholder="Quantity" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" required onchange="updatePrice(this)" />
                <input type="text" name="order_items[${productIndex}][price]" placeholder="Price" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-1/3" readonly />
            </div>
        `;
        document.getElementById('order-items').insertAdjacentHTML('beforeend', newProduct);
        productIndex++;
    }

    function updatePrice(element) {
        const orderItem = element.closest('.order-item');
        const priceField = orderItem.querySelector('input[name$="[price]"]');
        const quantityField = orderItem.querySelector('input[name$="[quantity]"]');
        
        if (element.tagName === 'SELECT') {
            const price = element.options[element.selectedIndex].getAttribute('data-price');
            priceField.value = price;
        }

        const price = parseFloat(priceField.value || 0);
        const quantity = parseInt(quantityField.value || 0);
        const totalPriceForItem = price * quantity;

        updateTotalPrice();
    }

    function updateTotalPrice() {
        let totalPrice = 0;

        const orderItems = document.querySelectorAll('.order-item');
        orderItems.forEach(item => {
            const priceField = item.querySelector('input[name$="[price]"]');
            const quantityField = item.querySelector('input[name$="[quantity]"]');
            
            const price = parseFloat(priceField.value || 0);
            const quantity = parseInt(quantityField.value || 0);
            totalPrice += price * quantity;
        });

        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }
</script>
