<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // 🛒 Show Cart Page
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // ➕ Add Product to Cart
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $found = false;
        foreach ($cart as &$item) {
            if ($item['name'] === $request->name) {
                $item['qty']++; // ✅ Increment quantity if already in cart
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'name' => $request->name,
                'price' => $request->price,
                'qty' => 1,
                'img' => $request->img,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', "{$request->name} added to cart!");
    }

    // 🔄 Update Quantity (real-time change)
    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $newQty = max(1, intval($request->input('qty', 1))); // prevent zero or negative qty
            $cart[$id]['qty'] = $newQty;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Quantity updated successfully!');
    }

    // ❌ Remove an Item
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Item removed successfully!');
    }

    // 🧹 Clear Entire Cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Cart cleared successfully!');
    }
}
