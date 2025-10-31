@extends('layouts.app')

@section('title', 'Shop - TimeVerse')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-5" 
     x-data="{ 
        open: false, 
        selected: {}, 
        reviews: JSON.parse(localStorage.getItem('reviews') || '{}'),
        newReview: '', 
        rating: 0,
        saveReview() {
            if (!this.selected.id || !this.newReview.trim()) return;
            if (!this.reviews[this.selected.id]) this.reviews[this.selected.id] = [];
            this.reviews[this.selected.id].push({ text: this.newReview, rating: this.rating, date: new Date().toLocaleString() });
            localStorage.setItem('reviews', JSON.stringify(this.reviews));
            this.newReview = '';
            this.rating = 0;
        }
     }">

    {{-- Page Header --}}
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-yellow-400 mb-2">🛍️ Explore Our Collection</h1>
        <p class="text-gray-400">Discover timeless luxury and modern craftsmanship.</p>
    </div>

    {{-- Filters --}}
    <div class="mb-6 flex flex-col md:flex-row justify-center items-center gap-4">
        
        {{-- Category Filter --}}
        <div class="flex gap-2">
            <a href="{{ route('shop') }}" class="px-4 py-2 rounded-full {{ !$category ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-gray-200' }}">All</a>
            <a href="{{ route('shop', ['category' => 'men']) }}" class="px-4 py-2 rounded-full {{ $category === 'men' ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-gray-200' }}">Men</a>
            <a href="{{ route('shop', ['category' => 'women']) }}" class="px-4 py-2 rounded-full {{ $category === 'women' ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-gray-200' }}">Women</a>
        </div>

        {{-- Search, Price Range & Sort Filters --}}
        <form method="GET" action="{{ route('shop') }}" class="flex gap-2 flex-wrap items-center justify-center">
            <input type="hidden" name="category" value="{{ $category }}">
            
            {{-- Search --}}
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search products..." 
                   class="px-3 py-1 rounded bg-gray-800 text-white border border-gray-700">

            {{-- Price Range Dropdown --}}
            <select name="price_range" class="px-3 py-1 rounded bg-gray-800 text-white border border-gray-700">
                <option value="">All Prices</option>
                <option value="under_10000" {{ ($priceRange ?? '') === 'under_10000' ? 'selected' : '' }}>Under 10,000</option>
                <option value="10000_15000" {{ ($priceRange ?? '') === '10000_15000' ? 'selected' : '' }}>10,000 – 15,000</option>
                <option value="15001_30000" {{ ($priceRange ?? '') === '15001_30000' ? 'selected' : '' }}>15,001 – 30,000</option>
                <option value="above_30000" {{ ($priceRange ?? '') === 'above_30000' ? 'selected' : '' }}>Above 30,000</option>
            </select>

            {{-- Sort By Dropdown --}}
            <select name="sort" class="px-3 py-1 rounded bg-gray-800 text-white border border-gray-700">
                <option value="">Sort By</option>
                <option value="low_high" {{ ($sort ?? '') === 'low_high' ? 'selected' : '' }}>Price: Low → High</option>
                <option value="high_low" {{ ($sort ?? '') === 'high_low' ? 'selected' : '' }}>Price: High → Low</option>
            </select>

            <button type="submit" class="px-4 py-1 bg-yellow-500 text-black rounded hover:bg-yellow-600">Filter</button>
        </form>
    </div>

    {{-- Products Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
        <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:scale-105 transition cursor-pointer"
             @click="open = true; selected = {
                 id: '{{ $product['id'] }}',
                 name: '{{ $product['name'] }}',
                 price: '{{ number_format($product['price']) }}',
                 image: '{{ asset('images/' . $product['image']) }}',
                 description: '{{ $product['description'] }}'
             }">
             
            <img src="{{ asset('images/' . $product['image']) }}" 
                 alt="{{ $product['name'] }}" 
                 class="w-full h-64 object-cover rounded-t-xl">

            <div class="p-4 text-center">
                <h5 class="text-lg font-bold text-yellow-400">{{ $product['name'] }}</h5>
                <p class="text-gray-400 mt-1 mb-3">PKR {{ number_format($product['price']) }}</p>

                {{-- Add to Cart --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="name" value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="img" value="{{ $product['image'] }}">
                    <button type="submit" 
                            class="w-full px-6 py-2 bg-yellow-500 text-black font-semibold rounded-full hover:bg-yellow-600 transition">
                        🛒 Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Product Details & Reviews Modal --}}
    <div x-show="open" x-cloak
         class="fixed inset-0 bg-black/70 flex items-center justify-center z-50"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90">

        <div class="bg-gray-900 rounded-xl shadow-2xl w-11/12 md:w-1/2 p-6 relative max-h-[90vh] overflow-y-auto">
            <button @click="open = false"
                    class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl">&times;</button>

            {{-- Product Info --}}
            <img :src="selected.image" :alt="selected.name"
                 class="w-full h-56 object-cover rounded-lg mb-4">

            <h3 class="text-2xl font-bold text-yellow-400" x-text="selected.name"></h3>
            <p class="text-gray-400 mt-2" x-text="selected.description"></p>
            <p class="text-yellow-500 font-semibold mt-3">PKR <span x-text="selected.price"></span></p>

            {{-- Add to Cart from Modal --}}
            <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="name" :value="selected.name">
                <input type="hidden" name="price" :value="selected.price.replace(/,/g,'')">
                <input type="hidden" name="img" :value="selected.image.split('/').pop()">
                <button type="submit" 
                        class="px-5 py-2 bg-yellow-500 text-black rounded-full font-semibold hover:bg-yellow-600">
                    🛒 Add to Cart
                </button>
            </form>

            {{-- Reviews Section --}}
            <div class="mt-6 border-t border-gray-700 pt-4">
                <h4 class="text-yellow-400 text-xl font-semibold mb-3">⭐ Customer Reviews</h4>

                {{-- Review List --}}
                <template x-if="reviews[selected.id] && reviews[selected.id].length > 0">
                    <div class="space-y-3">
                        <template x-for="rev in reviews[selected.id]" :key="rev.date">
                            <div class="bg-gray-800 p-3 rounded-lg border border-gray-700">
                                <p class="text-gray-300" x-text="rev.text"></p>
                                <p class="text-yellow-500 mt-1">
                                    <template x-for="i in 5">
                                        <span x-text="i <= rev.rating ? '⭐' : '☆'"></span>
                                    </template>
                                </p>
                                <p class="text-xs text-gray-500" x-text="rev.date"></p>
                            </div>
                        </template>
                    </div>
                </template>

                {{-- Add Review --}}
                <div class="mt-5">
                    <textarea x-model="newReview" placeholder="Write your review..." 
                              class="w-full bg-gray-800 text-gray-200 p-3 rounded-lg border border-gray-700 focus:outline-none focus:border-yellow-500"></textarea>
                    
                    <div class="flex items-center justify-between mt-3">
                        <div>
                            <span class="text-gray-400 mr-2">Rate:</span>
                            <template x-for="i in 5">
                                <span class="cursor-pointer text-2xl"
                                      :class="i <= rating ? 'text-yellow-500' : 'text-gray-500'"
                                      @click="rating = i">★</span>
                            </template>
                        </div>
                        <button @click="saveReview()"
                                class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2 rounded-lg font-semibold">
                            Submit Review
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
