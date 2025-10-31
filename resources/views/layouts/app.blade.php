 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeVerse | @yield('title')</title>

    <!-- ✅ Include Tailwind/Vite CSS -->
    @vite('resources/css/app.css')

    <!-- ✅ Add Alpine.js (needed for product preview modal) -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-black text-white font-sans">
    <!-- Header -->
    <header class="bg-black border-b border-yellow-600">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-3xl font-bold text-yellow-500 tracking-wider">TimeVerse</h1>
            <nav class="space-x-6 text-lg">
                <a href="{{ route('home') }}" class="hover:text-yellow-400">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-yellow-400">Shop</a>
                <a href="{{ route('cart') }}" class="hover:text-yellow-400">Cart</a>
                <a href="{{ route('checkout') }}" class="hover:text-yellow-400">Checkout</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-400">About</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black border-t border-yellow-600 text-center py-6 text-gray-400">
        <p>© {{ date('Y') }} <span class="text-yellow-500">TimeVerse</span>. All Rights Reserved.</p>
    </footer>
</body>
</html>
