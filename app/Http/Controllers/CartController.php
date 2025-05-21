<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request, $productId)
    {
        $cartItem = CartItem::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);
        $cartItem->quantity += 1;
        $cartItem->save();
        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->input('quantity', 1);
        $cartItem->save();
        return back();
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return back();
    }

    public function checkout()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();
        // Here you would handle order creation, payment, etc.
        CartItem::where('user_id', Auth::id())->delete();
        return view('checkout', compact('cartItems'));
    }
}
