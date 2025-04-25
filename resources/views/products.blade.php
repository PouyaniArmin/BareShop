@extends('layouts.mainLayout')

@section('title', 'All Products - Store')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="lg:flex lg:-mx-2">
            <!-- Filter Section -->
            <div class="lg:w-1/4 lg:px-2 space-y-4 sticky top-0 min-h-screen">
                <form method="GET" action="{{ route('products.filter') }}" class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Filter By</h3>

                    <!-- Category Filter -->
                    <div>
                        <h4 class="font-medium text-gray-500 dark:text-gray-300">Category</h4>
                        <div class="space-y-2 mt-2">
                            @foreach($categories as $category)
                            <label class="block cursor-pointer text-gray-700 dark:text-gray-300">
                                <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                    {{ in_array($category->id, request()->input('category', [])) ? 'checked' : '' }}>
                                {{ $category->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div>
                        <h4 class="font-medium text-gray-500 dark:text-gray-300">Price Range</h4>
                        <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}"
                            class="w-full mt-2 border rounded p-1" />
                        <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}"
                            class="w-full mt-2 border rounded p-1" />
                    </div>

                    <!-- Discount Filter -->
                    <div>
                        <h4 class="font-medium text-gray-500 dark:text-gray-300">Discount</h4>
                        <label class="cursor-pointer text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="discount" value="1" {{ request('discount') ? 'checked' : '' }}>
                            Has Discount
                        </label>
                    </div>

                    <!-- Active Filter -->
                    <div>
                        <h4 class="font-medium text-gray-500 dark:text-gray-300">Status</h4>
                        <label class="cursor-pointer text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="active" value="1" {{ request('active') ? 'checked' : '' }}>
                            Active
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col gap-2">
                        <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-500">Apply Filters</button>
                        <a href="" class="w-full block text-center py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Clear Filters</a>
                    </div>
                </form>
            </div>

            <!-- Product Display Section -->
            <div class="lg:w-3/4 lg:px-2">
                <!-- Sorting and Items Count -->
                <div class="flex items-center justify-between text-sm tracking-widest uppercase">
                    <p class="text-gray-500 dark:text-gray-300">{{ count($products) }} Items</p>
                    <div class="flex items-center">
                        <p class="text-gray-500 dark:text-gray-300">Sort By</p>
                        <!-- Dropdown Select for Sorting -->
                        <select class="ml-2 border border-gray-300 rounded-md py-2 px-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300" onchange="window.location.href=this.value">
                            <option value="{{ route('products.sort', 'recommended') }}">Recommended</option>
                            <option value="{{ route('products.sort', 'price_asc') }}">Price (Low to High)</option>
                            <option value="{{ route('products.sort', 'price_desc') }}">Price (High to Low)</option>
                            <option value="{{ route('products.sort', 'latest') }}">Newest</option>
                        </select>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 max-h-screen overflow-y-auto">
                    @foreach($products as $product)
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 flex items-center justify-center">
                            <img class="object-cover w-48 h-48 rounded-md"
                                src="{{ asset('storage/' . ($product->images->firstWhere('is_primary', true) ? $product->images->firstWhere('is_primary', true)->image_path : 'default-image.jpg')) }}"
                                alt="{{ $product->name }}">
                        </div>
                        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{ $product->name }}</h4>
                        <p class="text-blue-500">${{ $product->price }}</p>
                        <div class="flex gap-2 w-full mt-3">
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="w-1/2">
                                @csrf
                                <button type="submit" class="w-full px-2 py-1.5 text-sm text-white bg-gray-700 rounded-lg hover:bg-gray-600 transition-all duration-200">
                                    Add to Cart
                                </button>
                            </form>
                            <a href="{{ route('products.show', $product->id) }}" class="w-1/2 px-2 py-1.5 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-500 transition-all duration-200 text-center">
                                View
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
