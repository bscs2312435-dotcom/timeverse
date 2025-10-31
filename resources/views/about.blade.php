@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="bg-gray-950 text-gray-300 min-h-[80vh] py-16 px-6">
    <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-yellow-400 mb-6">About TimeVerse</h1>
        <p class="text-lg text-gray-400 mb-10 leading-relaxed">
            Welcome to <span class="text-yellow-400 font-semibold">TimeVerse</span>, where elegance meets precision.
            We are passionate about crafting timeless watches that combine sophistication, reliability, and modern design.
            Every watch we create represents our commitment to quality, luxury, and individuality.
        </p>

        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div class="text-left space-y-5">
                <h2 class="text-2xl font-semibold text-yellow-400">Our Mission</h2>
                <p class="text-gray-400">
                    At TimeVerse, our mission is to redefine how people experience time — 
                    through watches that not only tell time but tell your story.
                </p>

                <h2 class="text-2xl font-semibold text-yellow-400">Our Craft</h2>
                <p class="text-gray-400">
                    Each watch is designed with precision engineering and elegant aesthetics,
                    ensuring a perfect balance between form and function.
                </p>

                <h2 class="text-2xl font-semibold text-yellow-400">Why Choose TimeVerse?</h2>
                <ul class="list-disc list-inside text-gray-400">
                    <li>Premium Quality Materials</li>
                    <li>Modern and Classic Designs</li>
                    <li>Reliable After-Sales Service</li>
                    <li>Affordable Luxury for Everyone</li>
                </ul>
            </div>

            <div>
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800"
                     alt="Luxury Watch"
                     class="rounded-2xl shadow-2xl border border-yellow-700 mx-auto">
            </div>
        </div>
    </div>
</div>
@endsection
