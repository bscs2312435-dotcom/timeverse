@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <h2 class="text-4xl font-bold text-yellow-500 text-center mb-10">Your Shopping Cart</h2>

    <!-- ✅ Flash Message -->
    @if(session('success'))
        <div class="bg-green-600 text-white text-center py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- 🛒 Cart Items Table -->
    <div class="overflow-x-auto bg-gray-900 shadow-lg rounded-xl border border-yellow-700">
        <table class="min-w-full text-gray-200">
            <thead class="bg-yellow-600 text-black">
                <tr>
                    <th class="py-3 px-4 text-left">Product</th>
                    <th class="py-3 px-4">Price</th>
                    <th class="py-3 px-4">Quantity</th>
                    <th class="py-3 px-4">Total</th>
                    <th class="py-3 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cart as $index => $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                        <td class="flex items-center gap-4 py-4 px-4">
                            <img src="{{ asset('images/' . $item['img']) }}" 
                                 alt="{{ $item['name'] }}" 
                                 class="w-16 h-16 object-cover rounded-md border border-yellow-600">
                            <div>
                                <span class="font-semibold text-yellow-400 block">{{ $item['name'] }}</span>
                                <p class="text-sm text-gray-400">Exclusive TimeVerse Watch</p>
                            </div>
                        </td>
                        <td class="text-center">{{ number_format($item['price']) }} PKR</td>

                        <!-- ✅ Quantity Input (auto updates on change) -->
                        <td class="text-center">
                            <form action="{{ route('cart.updateQuantity', $index) }}" method="POST" class="inline">
                                @csrf
                                <input type="number" name="qty" value="{{ $item['qty'] }}" min="1"
                                       class="w-16 text-center rounded-md bg-gray-800 border border-gray-700 text-white"
                                       onchange="this.form.submit()">
                            </form>
                        </td>

                        <td class="text-center">{{ number_format($item['price'] * $item['qty']) }} PKR</td>

                        <td class="text-center">
                            <form action="{{ route('cart.remove', $index) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-400">
                            Your cart is empty 🛒
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 💰 Summary Section -->
    @if(count($cart) > 0)
        @php
            $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['qty'], $cart));
            $shipping = 500;
            $total = $subtotal + $shipping;
        @endphp

        <div class="mt-8 flex flex-col md:flex-row justify-between items-center bg-gray-800 p-6 rounded-xl border border-yellow-700">
            <div class="text-gray-300 text-lg">
                <p><span class="font-semibold text-yellow-400">Subtotal:</span> {{ number_format($subtotal) }} PKR</p>
                <p><span class="font-semibold text-yellow-400">Shipping:</span> {{ number_format($shipping) }} PKR</p>
                <p class="text-xl font-bold text-yellow-400 mt-2">Total: {{ number_format($total) }} PKR</p>
            </div>

            <div class="mt-4 md:mt-0 flex gap-3">
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Clear your entire cart?')">
                    @csrf
                    <button class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg">
                        Clear Cart
                    </button>
                </form>
                <a href="{{ route('checkout') }}" class="bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg shadow-lg">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
