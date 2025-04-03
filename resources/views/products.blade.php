@extends('layouts.mainLayout')
@section('title', 'All Products - Store')
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="lg:flex lg:-mx-2">
            <!-- Filter Section -->
            <div class="lg:w-1/4 lg:px-2 space-y-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Filter By</h3>

                <!-- Category Filter -->
                <div>
                    <h4 class="font-medium text-gray-500 dark:text-gray-300">Category</h4>
                    <div class="space-y-2 mt-2">
                        <input type="checkbox" id="jackets" class="hidden" />
                        <label for="jackets" class="block cursor-pointer text-gray-700 dark:text-gray-300">Jackets & Coats</label>

                        <input type="checkbox" id="hoodies" class="hidden" />
                        <label for="hoodies" class="block cursor-pointer text-gray-700 dark:text-gray-300">Hoodies</label>

                        <input type="checkbox" id="tshirts" class="hidden" />
                        <label for="tshirts" class="block cursor-pointer text-gray-700 dark:text-gray-300">T-shirts & Vests</label>
                    </div>
                </div>

                <!-- Color Filter -->
                <div>
                    <h4 class="font-medium text-gray-500 dark:text-gray-300">Color</h4>
                    <div class="flex space-x-2 mt-2">
                        <button class="w-6 h-6 rounded-full bg-red-500"></button>
                        <button class="w-6 h-6 rounded-full bg-blue-500"></button>
                        <button class="w-6 h-6 rounded-full bg-green-500"></button>
                        <button class="w-6 h-6 rounded-full bg-yellow-500"></button>
                    </div>
                </div>

                <!-- Price Filter -->
                <div class="mt-4">
                    <h4 class="font-medium text-gray-500 dark:text-gray-300">Price Range</h4>
                    <input type="range" min="0" max="100" value="50" class="w-full mt-2" />
                    <div class="flex justify-between text-sm mt-2">
                        <span>$0</span>
                        <span>$100</span>
                    </div>
                </div>

                <!-- Clear Filters Button -->
                <button class="w-full py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-500">Clear Filters</button>
            </div>

            <!-- Product Display Section -->
            <div class="lg:w-3/4 lg:px-2">
                <!-- Sorting and Items Count -->
                <div class="flex items-center justify-between text-sm tracking-widest uppercase">
                    <p class="text-gray-500 dark:text-gray-300">6 Items</p>
                    <div class="flex items-center">
                        <p class="text-gray-500 dark:text-gray-300">Sort By</p>
                        <select class="font-medium text-gray-700 bg-transparent dark:text-gray-500 focus:outline-none">
                            <option value="#">Recommended</option>
                            <option value="#">Size</option>
                            <option value="#">Price</option>
                        </select>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Product Card -->
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                            <img class="object-cover w-full h-72 xl:h-80" src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="T-shirt">
                        </div>
                        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">Printed T-shirt</h4>
                        <p class="text-blue-500">$12.55</p>
                        <button class="w-full px-2 py-2 mt-4 text-white bg-gray-800 rounded-md hover:bg-gray-700">
                            Add to Cart
                        </button>
                    </div>
                    <!-- Repeat the product cards for other items -->
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                            <img class="object-cover w-full h-72 xl:h-80" src="https://images.unsplash.com/photo-1620799139507-2a76f79a2f4d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=966&q=80" alt="T-shirt">
                        </div>
                        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">Slub Jersey T-shirt</h4>
                        <p class="text-blue-500">$18.70</p>
                        <button class="w-full px-2 py-2 mt-4 text-white bg-gray-800 rounded-md hover:bg-gray-700">
                            Add to Cart
                        </button>
                    </div>
                    <!-- More product cards can be added here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
