<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Tolit'Store</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .cart-header h1 {
            font-size: 24px;
            margin: 0;
        }

        .cart-items {
            margin-bottom: 30px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 2fr 1fr 1fr auto;
            gap: 20px;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }

        .item-details h3 {
            margin: 0 0 5px 0;
            font-size: 18px;
        }

        .item-price {
            font-weight: bold;
            font-size: 18px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-controls input {
            width: 60px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .remove-item {
            color: #e53935;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 20px;
        }

        .cart-summary {
            background: #f8f8f8;
            padding: 20px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .continue-shopping {
            display: inline-block;
            padding: 10px 20px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .continue-shopping:hover {
            background: #444;
        }

        .empty-cart {
            text-align: center;
            padding: 40px 0;
        }

        .empty-cart p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .cart-item {
                grid-template-columns: 80px 1fr;
                gap: 15px;
            }

            .item-price, .quantity-controls {
                grid-column: 2;
            }

            .remove-item {
                grid-column: 1 / -1;
                justify-self: end;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cart-header">
            <h1>Shopping Cart</h1>
            <a href="{{ url('/') }}" class="continue-shopping">Continue Shopping</a>
        </div>

        @if(session('success'))
            <div style="background: #4CAF50; color: white; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #e53935; color: white; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <img src="{{ asset($item->image_url) }}" alt="{{ $item->product_name }}">
                        <div class="item-details">
                            <h3>{{ $item->product_name }}</h3>
                        </div>
                        <div class="item-price">${{ number_format($item->price, 2) }}</div>
                        <form action="{{ route('cart.update.quantity', $item) }}" method="POST" class="quantity-controls">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" onchange="this.form.submit()">
                        </form>
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span>Total:</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div style="text-align: right; margin-top: 24px;">
                    <a href="{{ route('checkout') }}" class="btn" style="background: #3b82f6; color: #fff; padding: 12px 32px; border-radius: 6px; font-weight: 600; text-decoration: none;">Checkout</a>
                </div>
            </div>
        @else
            <div class="empty-cart">
                <p>Your cart is empty</p>
                <a href="{{ url('/') }}" class="continue-shopping">Start Shopping</a>
            </div>
        @endif
    </div>
</body>
</html> 