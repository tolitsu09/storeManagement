@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>
    <div class="bg-white rounded shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
        <ul class="mb-4">
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
                <li class="flex justify-between py-2 border-b">
                    <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                    <span>${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                </li>
                @php $total += $item->product->price * $item->quantity; @endphp
            @endforeach
        </ul>
        <div class="flex justify-between font-bold text-lg mb-6">
            <span>Total</span>
            <span>${{ number_format($total, 2) }}</span>
        </div>
        <div class="text-green-700 font-semibold mb-4">Thank you for your order! (Demo: No payment processed)</div>
        <a href="{{ url('/landing') }}" class="bg-black text-white px-6 py-3 rounded-full hover:bg-gray-800 transition">Back to Home</a>
    </div>
</div>
@endsection
