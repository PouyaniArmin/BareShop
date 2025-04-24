@extends('layouts.mainLayout')

@section('title', $product->name)

@section('content')
<section class="bg-white dark:bg-gray-900 py-10">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
            <!-- Product Image & Gallery -->
            <div class="flex flex-col items-center">
                <!-- تصویر اصلی -->
                <div class="w-full max-w-md">
                    <img id="mainImage"
                         src="{{ asset('storage/' . ($product->images->firstWhere('is_primary', true)?->image_path ?? $product->images->first()?->image_path ?? 'default-image.jpg')) }}"
                         alt="{{ $product->name }}"
                         class="w-full rounded-lg shadow-md object-cover">
                </div>

                <!-- گالری بندانگشتی -->
                @if($product->images->count() > 1)
                    <div class="flex gap-3 mt-4 overflow-x-auto">
                        @foreach($product->images as $image)
                            <img onclick="document.getElementById('mainImage').src='{{ asset('storage/' . $image->image_path) }}'"
                                 src="{{ asset('storage/' . $image->image_path) }}"
                                 class="w-20 h-20 object-cover rounded-md cursor-pointer border hover:ring-2 ring-blue-400 transition" />
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-4">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $product->name }}</h2>

                <!-- Price and Discount -->
                <div class="text-2xl font-semibold text-blue-600">
                    @if($product->discount > 0)
                        <span class="line-through text-gray-500">${{ $product->price }}</span>
                        <span class="ml-2">${{ number_format($product->price * (1 - $product->discount / 100), 2) }}</span>
                    @else
                        ${{ $product->price }}
                    @endif
                </div>

                <!-- Stock -->
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    @if($product->stock > 0)
                        In Stock ({{ $product->stock }})
                    @else
                        <span class="text-red-600">Out of Stock</span>
                    @endif
                </div>

                <!-- Category -->
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Category: {{ $product->category->name }}
                </div>

                <!-- Seller -->
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Seller: {{ $product->seller->name ?? 'N/A' }}
                </div>

                <!-- Description -->
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $product->description }}
                </p>

                <!-- Buttons -->
                <div class="flex gap-4 mt-6">
                    <form method="POST" action="">
                        @csrf
                        <button type="submit"
                                class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-500 transition">
                            Add to Cart
                        </button>
                    </form>

                    <a href=""
                       class="px-6 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
