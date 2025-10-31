<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'ChronoX Silver', 'price' => 12500, 'category' => 'men', 'image' => 'watch1.jpg'],
        ['id' => 2, 'name' => 'Aurex Classic', 'price' => 15800, 'category' => 'men', 'image' => 'watch2.jpg'],
        ['id' => 3, 'name' => 'Noir Elegance', 'price' => 17900, 'category' => 'women', 'image' => 'watch3.jpg'],
        ['id' => 4, 'name' => 'Velura Gold', 'price' => 18900, 'category' => 'women', 'image' => 'watch4.jpg'],
        ['id' => 5, 'name' => 'Urban Steel', 'price' => 13400, 'category' => 'men', 'image' => 'watch5.jpg'],
        ['id' => 6, 'name' => 'Aurora Pearl', 'price' => 16500, 'category' => 'women', 'image' => 'watch6.jpg'],
        ['id' => 7, 'name' => 'Titan Edge', 'price' => 21000, 'category' => 'men', 'image' => 'watch7.jpg'],
        ['id' => 8, 'name' => 'Luxe Diamond', 'price' => 25500, 'category' => 'women', 'image' => 'watch8.jpg'],
        ['id' => 9, 'name' => 'Bold Chronograph', 'price' => 19900, 'category' => 'men', 'image' => 'watch9.jpg'],
        ['id' => 10, 'name' => 'Sapphire Essence', 'price' => 23000, 'category' => 'women', 'image' => 'watch10.jpg'],
    ];

    public function home() { return view('home'); }

    public function shop() {
        return view('shop', ['products' => $this->products]);
    }

    public function men() {
        $men = array_filter($this->products, fn($p) => $p['category'] === 'men');
        return view('men', ['products' => $men]);
    }

    public function women() {
        $women = array_filter($this->products, fn($p) => $p['category'] === 'women');
        return view('women', ['products' => $women]);
    }

    public function about() { return view('about'); }
    public function contact() { return view('contact'); }
    public function checkout() { return view('checkout'); }

    // Cart Functions
    public function cart(Request $req) {
        $cart = session()->get('cart', []);
        return view('cart', ['cart' => $cart]);
    }

    public function addToCart(Request $req, $id) {
        $cart = session()->get('cart', []);
        $product = collect($this->products)->firstWhere('id', $id);

        if(!$product) return redirect()->back();

        if(isset($cart[$id])) $cart[$id]['quantity']++;
        else $cart[$id] = ['name' => $product['name'], 'price' => $product['price'], 'quantity' => 1];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Added to cart!');
    }

    public function removeFromCart($id) {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCart(Request $req, $id, $action) {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            if($action == 'increase') $cart[$id]['quantity']++;
            if($action == 'decrease' && $cart[$id]['quantity'] > 1) $cart[$id]['quantity']--;
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
