 <footer class="bg-gray-950 text-gray-300 border-t border-yellow-700 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-4 gap-10">
        
        <!-- Brand Info -->
        <div>
            <h2 class="text-2xl font-bold text-yellow-400 mb-4">TimeVerse</h2>
            <p class="text-gray-400">
                Experience the art of timeless elegance with TimeVerse — 
                where every second tells a story of precision and class.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-xl font-semibold text-yellow-400 mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-yellow-400">Home</a></li>
                <li><a href="{{ route('shop') }}" class="hover:text-yellow-400">Shop</a></li>
                <li><a href="{{ route('cart') }}" class="hover:text-yellow-400">Cart</a></li>
                <li><a href="{{ route('checkout') }}" class="hover:text-yellow-400">Checkout</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-yellow-400">About</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a></li>
            </ul>
        </div>

        <!-- Customer Service -->
        <div>
            <h3 class="text-xl font-semibold text-yellow-400 mb-4">Customer Service</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-yellow-400">FAQs</a></li>
                <li><a href="#" class="hover:text-yellow-400">Shipping Policy</a></li>
                <li><a href="#" class="hover:text-yellow-400">Return Policy</a></li>
                <li><a href="#" class="hover:text-yellow-400">Warranty</a></li>
            </ul>
        </div>

        <!-- Contact + Social -->
        <div>
            <h3 class="text-xl font-semibold text-yellow-400 mb-4">Get in Touch</h3>
            <p class="text-gray-400">Email: <span class="text-yellow-300">support@timeverse.com</span></p>
            <p class="text-gray-400">Phone: +92 300 1234567</p>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="hover:text-yellow-400"><i class="bi bi-facebook text-2xl"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="bi bi-instagram text-2xl"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="bi bi-twitter text-2xl"></i></a>
                <a href="#" class="hover:text-yellow-400"><i class="bi bi-youtube text-2xl"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-yellow-800 text-center py-4 text-sm text-gray-500">
        © {{ date('Y') }} <span class="text-yellow-400 font-semibold">TimeVerse</span>. All rights reserved.
    </div>
</footer>
