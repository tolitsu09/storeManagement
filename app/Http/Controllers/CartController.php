<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItems = Auth::user()->cartItems()->get();
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        return view('cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|string'
        ]);

        $existingItem = Auth::user()->cartItems()
            ->where('product_name', $request->product_name)
            ->first();

        if ($existingItem) {
            $existingItem->increment('quantity');
        } else {
            Auth::user()->cartItems()->create([
                'product_name' => $request->product_name,
                'price' => $request->price,
                'image_url' => $request->image_url,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }

    public function removeFromCart(CartItem $cartItem)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($cartItem->user_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $cartItem->delete();
        return back()->with('success', 'Item removed from cart successfully!');
    }

    public function updateQuantity(Request $request, CartItem $cartItem)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($cartItem->user_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update(['quantity' => $request->quantity]);
        return back()->with('success', 'Quantity updated successfully!');
    }
}
