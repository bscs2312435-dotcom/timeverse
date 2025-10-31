@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="min-h-[80vh] bg-gray-950 text-gray-200 px-6 py-16">
    <div class="max-w-4xl mx-auto bg-gray-900 border border-yellow-700 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-bold text-yellow-400 mb-6">Checkout</h2>

        <form action="{{ route('order.confirmation') }}" method="GET" class="space-y-6">
            <!-- Customer Info -->
            <div>
                <label class="block text-sm font-semibold mb-2 text-yellow-300">Full Name</label>
                <input type="text" name="name" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2 text-yellow-300">Email Address</label>
                <input type="email" name="email" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2 text-yellow-300">Address</label>
                <textarea name="address" rows="3" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2 text-yellow-300">Payment Method</label>
                <select name="payment" class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500">
                    <option>Cash on Delivery</option>
                    <option>Credit/Debit Card</option>
                    <option>EasyPaisa / JazzCash</option>
                </select>
            </div>

            <div class="flex justify-between items-center pt-6">
                <a href="{{ route('cart') }}" class="text-yellow-400 hover:text-yellow-500 font-semibold">← Back to Cart</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-6 py-3 rounded-lg transition">
                    Confirm Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
