@extends('layouts.mainLayout')
@section('title', 'Home - Store')
@section('content')
<!-- banner -->
<section class="p-6 shadow-lg text-center">
    <div class="bg-gradient-to-r from-indigo-400 via-indigo-500 to-indigo-600 text-white py-20 px-6 md:px-16 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl font-extrabold leading-tight">
                Smart Shopping, Better Experience
            </h1>
            <p class="text-lg mt-4 max-w-lg">
                Find the best digital products with special discounts! Don’t miss out, shop now.
            </p>
            <a href="#" class="mt-6 inline-block bg-white text-indigo-700 hover:bg-indigo-600 hover:text-white py-3 px-6 rounded-lg text-lg font-medium transition duration-300 ease-in-out transform hover:scale-105">
                Explore Products
            </a>
        </div>
        <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
            <img src="https://source.unsplash.com/500x500/?technology" alt="Digital Product" class="w-80 rounded-lg shadow-lg">
        </div>
    </div>
</section>

<hr>

<!-- features -->
<div class="pt-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center mt-8">Our Features</h2>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="w-full items-center mx-auto max-w-screen-lg">
            <div class="group grid w-full grid-cols-2">
                <div>
                    <div class="pr-12">
                        <p class="peer mb-6 text-gray-400">
                            Simply Air Conditioning London are fixed system heating and air conditioning installation specialists. Because we’ve tested all heating and air conditioning unit manufacturers before using them there are no hidden surprises for our customers.
                        </p>
                        <p class="mb-6 text-gray-400">
                            We also provide tailored Air Conditioning installation packages. The Air Conditioning systems we install are all inverter driven.
                        </p>
                        <h3 class="mb-4 font-semibold text-xl text-gray-400">Conditioning installation packages</h3>
                        <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-slate-500">
                            <li>5 cups chopped Porcini mushrooms</li>
                            <li>1/2 cup of olive oil</li>
                            <li>3lb of celery</li>
                        </ul>
                    </div>
                </div>
                <div class="pr-16 relative flex flex-col before:block before:absolute before:h-1/6 before:w-4 before:bg-blue-500 before:bottom-0 before:right-0 before:rounded-lg before:transition-all group-hover:before:bg-orange-300 overflow-hidden">
                    <div class="absolute top-0 right-0 bg-blue-500 w-4/6 px-12 py-14 flex flex-col justify-center rounded-xl group-hover:bg-sky-600 transition-all">
                        <span class="block mb-10 font-bold group-hover:text-orange-300">HERE WE ARE</span>
                        <h2 class="text-white font-bold text-3xl">
                            What started as a tiny team mostly dedicated to Air Quality has grown.
                        </h2>
                    </div>
                    <a class="font-bold text-sm flex mt-2 mb-8 items-center gap-2" href="">
                        <span>MORE ABOUT US</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <div class="rounded-xl overflow-hidden">
                        <img src="https://picsum.photos/800/800" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- best item -->
<div>
    <h2 class="text-3xl font-bold text-gray-800 text-center mt-8">Best Items</h2>
    <div class="bg-gradient-to-bl from-blue-50 to-violet-50 flex items-center justify-center lg:h-screen">
        <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                @foreach ($bestProducts as $product)
                    <div class="bg-white rounded-lg border p-4">
                        <img src="{{ asset('storage/' .$product->images->first()->image_path )}}" alt="{{ $product->name }}" class="w-full h-48 rounded-md object-cover">
                        <div class="px-1 py-4">
                            <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class="px-1 py-4">
                            <a href="#" class="text-blue-500 hover:underline">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- category -->
<section class="py-12 bg-gray-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Featured Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($categories as $category)
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->products_count }} Products</p>
                    <p class="text-gray-500 text-sm">{{ Str::limit($category->description, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<hr>
<!-- newsletter -->
<div class="pt-10 shadow-lg">
    <div class="p-6 container md:w-2/3 xl:w-auto mx-auto flex flex-col xl:items-stretch justify-between xl:flex-row">
        <div class="xl:w-1/2 md:mb-14 xl:mb-0 relative h-auto flex items-center justify-center">
            <img src="https://cdn.tuk.dev/assets/components/26May-update/newsletter-1.png" alt="Envelope with a newsletter" class="h-full xl:w-full lg:w-1/2 w-full" />
        </div>
        <div class="w-full xl:w-1/2 xl:pl-40 xl:py-28">
            <h1 class="text-2xl md:text-4xl xl:text-5xl font-bold leading-10 text-gray-800 mb-4 text-center xl:text-left">Subscribe</h1>
            <p class="text-base leading-normal text-gray-600 text-center xl:text-left">Stay updated with our latest products and offers.</p>
            <div class="flex items-stretch mt-12">
                <input class="bg-gray-100 rounded-lg rounded-r-none text-base leading-none text-gray-800 p-5 w-4/5 border border-transparent focus:outline-none focus:border-gray-500" type="email" placeholder="Your Email" />
                <button class="w-32 rounded-l-none hover:bg-indigo-600 bg-indigo-700 rounded text-base font-medium leading-none text-white p-5 uppercase focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">subscribe</button>
            </div>
        </div>
    </div>
</div>

<!-- call to action -->
<section class="py-16 bg-indigo-700 text-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-4">Don't Miss Out on Our Latest Deals!</h2>
        <p class="text-lg mb-6">Join now and get exclusive discounts on your favorite products.</p>
        <a href="/shop" class="bg-white text-indigo-700 px-6 py-3 rounded-lg font-semibold text-lg shadow-md hover:bg-gray-200 transition">Shop Now</a>
    </div>
</section>

@endsection
