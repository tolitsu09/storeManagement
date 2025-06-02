<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #{{ $order->id }} - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8fafc; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 32px; }
        h1 { font-size: 1.5rem; margin-bottom: 18px; }
        .meta { margin-bottom: 18px; color: #64748b; }
        .meta strong { color: #1e293b; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { padding: 10px 8px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { background: #f1f5f9; font-weight: 600; }
        tr:last-child td { border-bottom: none; }
        .status { padding: 4px 12px; border-radius: 12px; font-size: 0.95rem; font-weight: 600; }
        .pending { background: #fef3c7; color: #b45309; }
        .completed { background: #d1fae5; color: #065f46; }
        .cancelled { background: #fee2e2; color: #991b1b; }
        .shipped { background: #bfdbfe; color: #1e40af; }
        .btn { background: #3b82f6; color: #fff; padding: 6px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: background 0.2s; border: none; cursor: pointer; }
        .btn:hover { background: #2563eb; }
        .back-link { display: inline-block; margin-bottom: 18px; color: #3b82f6; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .form-group { margin-bottom: 18px; }
        label { font-weight: 600; margin-right: 8px; }
        select { padding: 6px 12px; border-radius: 6px; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('admin.logout') }}" style="text-align:right;">
            @csrf
            <button type="submit" style="background:#ff4d2d;color:#fff;border:none;padding:8px 18px;border-radius:6px;font-weight:600;cursor:pointer;float:right;margin-bottom:18px;">Logout</button>
        </form>
        <a href="{{ route('admin.orders') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Orders</a>
        <h1>Order #{{ $order->id }}</h1>
        <div class="meta">
            <div><strong>User:</strong> {{ $order->user ? $order->user->name : 'N/A' }} (ID: {{ $order->user_id }})</div>
            <div><strong>Status:</strong> <span class="status {{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span></div>
            <div><strong>Created:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</div>
            <div><strong>Total:</strong> ${{ number_format($order->total, 2) }}</div>
        </div>
        <h2 style="font-size:1.1rem; margin-bottom:10px;">Items</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['product_name'] ?? '' }}</td>
                        <td>${{ number_format($item['price'] ?? 0, 2) }}</td>
                        <td>{{ $item['quantity'] ?? 1 }}</td>
                        <td>${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form method="POST" action="{{ route('admin.order.updateStatus', $order->id) }}">
            @csrf
            <div class="form-group">
                <label for="status">Update Status:</label>
                <select name="status" id="status">
                    <option value="pending" @if($order->status=='pending') selected @endif>Pending</option>
                    <option value="shipped" @if($order->status=='shipped') selected @endif>Shipped</option>
                    <option value="completed" @if($order->status=='completed') selected @endif>Completed</option>
                    <option value="cancelled" @if($order->status=='cancelled') selected @endif>Cancelled</option>
                </select>
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html> 