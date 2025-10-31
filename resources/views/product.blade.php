@extends('layouts.app')

@section('title', $product['name'])

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row gap-8 bg-gray-900 p-6 rounded-xl border border-yellow-700 shadow-lg">
        <img src="{{ asset('images/' . $product['img']) }}" alt="{{ $product['name'] }}" 
             class="w-80 h-80 object-cover rounded-lg border border-yellow-600">
        <div>
            <h1 class="text-3xl font-bold text-yellow-400 mb-2">{{ $product['name'] }}</h1>
            <p class="text-gray-300 mb-4">{{ $product['description'] }}</p>
            <p class="text-2xl font-semibold text-yellow-500 mb-4">{{ number_format($product['price']) }} PKR</p>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <input type="hidden" name="name" value="{{ $product['name'] }}">
                <input type="hidden" name="price" value="{{ $product['price'] }}">
                <input type="hidden" name="img" value="{{ $product['img'] }}">
                <input type="number" name="qty" value="1" min="1" 
                       class="w-20 rounded-md text-center bg-gray-800 text-white border border-gray-700">
                <button type="submit" class="ml-4 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>

    <!-- 💬 Reviews Section -->
    <div class="mt-10 bg-gray-900 p-6 rounded-xl border border-yellow-700">
        <h2 class="text-2xl font-bold text-yellow-400 mb-4">Customer Reviews</h2>

        @if (session('success'))
            <div class="bg-green-600 text-white text-center py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($reviews as $review)
            <div class="border-b border-gray-700 py-3">
                <p class="text-yellow-400 font-semibold">{{ $review['name'] }}</p>
                <p class="text-gray-300">{{ $review['comment'] }}</p>
                <p class="text-gray-500 text-sm">{{ $review['date'] }}</p>
            </div>
        @empty
            <p class="text-gray-400">No reviews yet. Be the first to review this product!</p>
        @endforelse

        <form action="{{ route('product.review', $product['id']) }}" method="POST" class="mt-6">
            @csrf
            <h3 class="text-xl text-yellow-400 font-semibold mb-2">Leave a Review</h3>
            <input type="text" name="name" placeholder="Your Name" class="w-full mb-3 p-2 rounded bg-gray-800 text-white border border-gray-700" required>
            <textarea name="comment" placeholder="Your Review" rows="4" class="w-full mb-3 p-2 rounded bg-gray-800 text-white border border-gray-700" required></textarea>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-6 py-2 rounded-lg">
                Submit Review
            </button>
        </form>
    </div>
</div>
@endsection
