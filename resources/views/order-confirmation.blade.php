@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[80vh] bg-gray-950 px-6 py-16 text-center">
    <div class="bg-gray-900 border border-yellow-600 rounded-2xl shadow-2xl p-10 max-w-lg w-full">
        <div class="flex justify-center mb-6">
            <div class="bg-yellow-500 p-4 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-yellow-400 mb-4">Order Confirmed!</h2>
        <p class="text-gray-300 mb-6">
            Thank you for shopping at <span class="text-yellow-400 font-semibold">TimeVerse</span>.<br>
            Your order has been successfully placed and is being processed.
        </p>

        <div class="bg-gray-800 border border-yellow-700 rounded-lg p-4 mb-6 text-left text-gray-300">
            <h4 class="text-yellow-400 font-semibold text-lg mb-2">Order Details</h4>
            <p><span class="text-gray-400">Order ID:</span> #TV-1023</p>
            <p><span class="text-gray-400">Estimated Delivery:</span> 3-5 Business Days</p>
            <p><span class="text-gray-400">Payment Method:</span> Cash on Delivery</p>
        </div>

        <a href="{{ route('shop') }}" 
           class="inline-block bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-6 py-3 rounded-lg transition mb-3">
            Continue Shopping
        </a>

        <a href="{{ route('home') }}" 
           class="block text-gray-400 hover:text-yellow-400 text-sm mt-2 transition">
            Return to Home
        </a>
    </div>
</div>
@endsection
