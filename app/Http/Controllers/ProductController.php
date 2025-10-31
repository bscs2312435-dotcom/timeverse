<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🔹 Product list (same as ShopController)
    private $products = [
        [
            'id' => 1,
            'name' => 'Eclipse Chronograph',
            'price' => 34500,
            'image' => 'watch1.jpg',
            'description' => 'A modern chronograph with black and gold detailing. Designed for style and precision.',
        ],
        [
            'id' => 2,
            'name' => 'Celestial Classic',
            'price' => 28900,
            'image' => 'watch2.jpg',
            'description' => 'Timeless design with stellar precision. Perfect for formal and casual occasions.',
        ],
        [
            'id' => 3,
            'name' => 'Noir Prestige',
            'price' => 41000,
            'image' => 'watch3.jpg',
            'description' => 'Luxury meets minimalism in this bold black masterpiece. A statement of class.',
        ],
        [
            'id' => 4,
            'name' => 'Aurora Steel',
            'price' => 32500,
            'image' => 'watch4.jpg',
            'description' => 'Shining silver finish with flawless craftsmanship for the modern professional.',
        ],
        [
            'id' => 5,
            'name' => 'Golden Monarch',
            'price' => 45500,
            'image' => 'watch5.jpg',
            'description' => 'Royal gold tones for those who lead. A watch that defines elegance and power.',
        ],
        [
            'id' => 6,
            'name' => 'Silver Hawk',
            'price' => 31500,
            'image' => 'watch6.jpg',
            'description' => 'Sleek silver casing with precision timing. Built for performance and endurance.',
        ],
    ];

    // 🧭 Show Single Product
    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('product-details', compact('product'));
    }

    // ⭐ Add Review
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        // Save reviews later (for now just redirect back)
        return redirect()->back()->with('success', 'Review added successfully!');
    }
}
