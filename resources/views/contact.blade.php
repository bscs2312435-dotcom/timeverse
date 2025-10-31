@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="bg-gray-950 text-gray-300 min-h-[80vh] py-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-yellow-400 mb-6">Get in Touch</h1>
        <p class="text-gray-400 mb-10">
            Have a question, feedback, or just want to say hello?  
            We’d love to hear from you! Reach out to us using the form below.
        </p>

        <div class="bg-gray-900 border border-yellow-700 rounded-2xl p-8 shadow-xl">
            <form action="#" method="POST" class="space-y-6 text-left">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2 text-yellow-300">Full Name</label>
                    <input type="text" name="name" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2 text-yellow-300">Email Address</label>
                    <input type="email" name="email" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2 text-yellow-300">Message</label>
                    <textarea name="message" rows="4" required class="w-full bg-gray-800 border border-yellow-600 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-8 py-3 rounded-lg transition">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-12 text-gray-400">
            <p><strong>Email:</strong> support@timeverse.com</p>
            <p><strong>Phone:</strong> +92 300 1234567</p>
            <p><strong>Location:</strong> Karachi, Pakistan</p>
        </div>
    </div>
</div>
@endsection
