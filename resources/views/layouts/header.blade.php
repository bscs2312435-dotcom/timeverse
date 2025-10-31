<nav class="bg-black text-white">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-2xl font-bold text-yellow-400">Time<span class="text-white">Verse</span></a>

    <div class="hidden md:flex gap-6 items-center">
      <a href="{{ route('home') }}" class="hover:text-yellow-400">Home</a>
      <a href="{{ route('shop') }}" class="hover:text-yellow-400">Shop</a>
      <a href="{{ route('about') }}" class="hover:text-yellow-400">About</a>
      <a href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a>

      <a href="{{ route('cart') }}" class="ml-4 inline-flex items-center gap-2">
        🛒
        <span class="bg-yellow-400 text-black rounded-full px-2 text-sm">
          {{ count(session('cart', [])) }}
        </span>
      </a>
    </div>
  </div>
</nav>
