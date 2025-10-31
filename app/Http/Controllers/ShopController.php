<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category   = $request->input('category', '');
        $priceRange = $request->input('price_range', '');
        $sort       = $request->input('sort', '');
        $search     = $request->input('search', '');

        // 🕒 Product List
        $products = [
            ['id' => 1, 'name' => 'Eclipse Chronograph', 'price' => 34500, 'image' => 'watch1.jpg', 'category' => 'men', 'description' => 'A modern chronograph with black and gold detailing.'],
            ['id' => 2, 'name' => 'Celestial Classic', 'price' => 28900, 'image' => 'watch2.jpg', 'category' => 'women', 'description' => 'Timeless design with stellar precision.'],
            ['id' => 3, 'name' => 'Noir Prestige', 'price' => 41000, 'image' => 'watch3.jpg', 'category' => 'men', 'description' => 'Luxury meets minimalism in this bold black masterpiece.'],
            ['id' => 4, 'name' => 'Aurora Steel', 'price' => 32500, 'image' => 'watch4.jpg', 'category' => 'women', 'description' => 'Shining silver finish with flawless craftsmanship.'],
            ['id' => 5, 'name' => 'Golden Monarch', 'price' => 45500, 'image' => 'watch5.jpg', 'category' => 'men', 'description' => 'Royal gold tones for those who lead.'],
            ['id' => 6, 'name' => 'Silver Hawk', 'price' => 31500, 'image' => 'watch6.jpg', 'category' => 'women', 'description' => 'Sleek silver casing with precision timing.'],
            ['id' => 7, 'name' => 'Lunar Eclipse', 'price' => 37000, 'image' => 'watch7.jpg', 'category' => 'men', 'description' => 'Elegant black dial with moon-phase feature.'],
            ['id' => 8, 'name' => 'Ocean Wave', 'price' => 29800, 'image' => 'watch8.jpg', 'category' => 'women', 'description' => 'Water-resistant design with a deep blue dial.'],
            ['id' => 9, 'name' => 'Crimson Dawn', 'price' => 43500, 'image' => 'watch9.jpg', 'category' => 'men', 'description' => 'Bold red accents on a steel frame.'],
            ['id' => 10, 'name' => 'Emerald Leaf', 'price' => 32500, 'image' => 'watch10.jpg', 'category' => 'women', 'description' => 'Green dial with classic elegance.'],
            ['id' => 11, 'name' => 'Titanium Storm', 'price' => 46000, 'image' => 'watch11.jpg', 'category' => 'men', 'description' => 'Ultra-light titanium body with a robust design.'],
            ['id' => 12, 'name' => 'Sapphire Sky', 'price' => 38900, 'image' => 'watch12.jpg', 'category' => 'women', 'description' => 'Blue sapphire dial that captures light beautifully.'],
            ['id' => 13, 'name' => 'Obsidian Shadow', 'price' => 42000, 'image' => 'watch13.jpg', 'category' => 'men', 'description' => 'Jet-black design with subtle details.'],
            ['id' => 14, 'name' => 'Rose Elegance', 'price' => 34000, 'image' => 'watch14.jpg', 'category' => 'women', 'description' => 'Rose-gold accents and soft leather strap.'],
            ['id' => 15, 'name' => 'Midnight Voyager', 'price' => 45500, 'image' => 'watch15.jpg', 'category' => 'men', 'description' => 'Dark dial with luminous hands.'],
        ];

        // 🔹 Filter by category
        if ($category) {
            $products = array_filter($products, fn($p) => $p['category'] === $category);
        }

        // 🔹 Filter by search
        if ($search) {
            $products = array_filter($products, fn($p) => stripos($p['name'], $search) !== false);
        }

        // 🔹 Filter by price range
        if ($priceRange) {
            $products = array_filter($products, function($p) use ($priceRange) {
                switch ($priceRange) {
                    case 'under_10000': return $p['price'] < 10000;
                    case '10000_15000': return $p['price'] >= 10000 && $p['price'] <= 15000;
                    case '15001_30000': return $p['price'] >= 15001 && $p['price'] <= 30000;
                    case 'above_30000': return $p['price'] > 30000;
                }
                return true;
            });
        }

        // 🔹 Sort products
        if ($sort === 'low_high') {
            usort($products, fn($a, $b) => $a['price'] <=> $b['price']);
        } elseif ($sort === 'high_low') {
            usort($products, fn($a, $b) => $b['price'] <=> $a['price']);
        }

        return view('shop', [
            'products'   => $products,
            'category'   => $category,
            'priceRange' => $priceRange,
            'sort'       => $sort,
            'search'     => $search,
        ]);
    }
}
// Test commit
