<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItems = Auth::user()->cartItems()->get();
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $discount = session('discount', 0);
        $discountCode = session('discount_code', '');
        $finalTotal = max($total - $discount, 0);

        return view('checkout', compact('total', 'discount', 'discountCode', 'finalTotal'));
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string',
        ]);

        $code = strtolower($request->discount_code);
        if ($code === 'minyo') {
            session(['discount' => 100, 'discount_code' => $code]);
            return redirect()->route('checkout')->with('success', 'Discount code applied!');
        } else {
            session(['discount' => 0, 'discount_code' => '']);
            return redirect()->route('checkout')->with('error', 'Invalid discount code.');
        }
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $cartItems = $user->cartItems()->get();
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        $discount = session('discount', 0);
        $finalTotal = max($total - $discount, 0);

        // Create order
        Order::create([
            'user_id' => $user->id,
            'items' => $cartItems->toJson(),
            'total' => $finalTotal,
            'status' => 'pending',
        ]);

        // Clear cart
        $user->cartItems()->delete();
        session()->forget(['discount', 'discount_code']);

        return redirect()->route('checkout.complete');
    }

    public function complete()
    {
        return view('checkout.complete');
    }
}
