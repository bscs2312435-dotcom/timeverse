@extends('layouts.app')

@section('title', 'Home - TimeVerse')

@section('content')
 <!-- HERO SECTION -->
<section class="relative bg-black text-white h-[90vh] flex flex-col items-center justify-center text-center px-6"
         style="background-image: url('{{ asset('images/hero-watch.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;">
    <!-- Dark overlay for readability -->
    <div class="absolute inset-0 bg-black/70"></div>

    <div class="relative z-10">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-400 tracking-wide mb-4">TimeVerse</h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
            Discover precision, elegance, and craftsmanship in every second.  
            Step into a world where time meets luxury.
        </p>
        <a href="{{ route('shop') }}"
           class="mt-8 px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold rounded-full shadow-lg transition">
           Shop Now
        </a>
    </div>
</section>


<!-- FEATURED WATCHES -->
<section class="bg-[#0a0a0a] text-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-yellow-400 mb-12">
            Featured Watches
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach ([
                ['img' => 'watch1.jpg', 'name' => 'Eclipse Chronograph', 'price' => 34500],
                ['img' => 'watch2.jpg', 'name' => 'Celestial Classic', 'price' => 28900],
                ['img' => 'watch3.jpg', 'name' => 'Noir Prestige', 'price' => 41000],
                ['img' => 'watch4.jpg', 'name' => 'Aurora Steel', 'price' => 32500],
            ] as $watch)
                <div class="bg-gray-900 p-5 rounded-xl shadow-lg hover:scale-105 transition">
                    <img src="{{ asset('images/' . $watch['img']) }}" alt="{{ $watch['name'] }}"
                         class="w-full h-64 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $watch['name'] }}</h3>
                    <p class="text-yellow-400 font-bold mb-3">PKR {{ number_format($watch['price']) }}</p>
                    <a href="{{ route('cart') }}"
                       class="inline-block bg-yellow-500 text-black font-semibold px-6 py-2 rounded-full hover:bg-yellow-600 transition">
                       Add to Cart
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ABOUT PREVIEW -->
<section class="bg-black py-20 text-center text-gray-300">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-yellow-400 mb-4">Crafted for Perfection</h2>
        <p class="text-lg">
            Each TimeVerse watch is designed with meticulous attention to detail — 
            combining modern design with timeless craftsmanship.  
            Because you don’t just wear a watch, you wear a statement.
        </p>
        <a href="{{ route('about') }}"
           class="mt-8 inline-block bg-yellow-500 text-black font-semibold px-8 py-3 rounded-full hover:bg-yellow-600 transition">
           Learn More
        </a>
    </div>
</section>
@endsection
