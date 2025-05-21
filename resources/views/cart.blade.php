@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Your Cart</h2>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Product</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cartItems as $item)
                <tr>
                    <td class="py-2 px-4 border-b flex items-center gap-2">
                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded">
                        <span>{{ $item->product->name }}</span>
                    </td>
                    <td class="py-2 px-4 border-b">${{ number_format($item->product->price, 2) }}</td>
                    <td class="py-2 px-4 border-b">
                        <form method="POST" action="{{ route('cart.update', $item->id) }}" class="inline-flex items-center gap-2">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                        </form>
                    </td>
                    <td class="py-2 px-4 border-b">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td class="py-2 px-4 border-b">
                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Your cart is empty.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($cartItems->count())
    <div class="flex justify-end mt-6">
        <a href="{{ route('cart.checkout') }}" class="bg-black text-white px-6 py-3 rounded-full hover:bg-gray-800 transition">Proceed to Checkout</a>
    </div>
    @endif
</div>
@endsection
