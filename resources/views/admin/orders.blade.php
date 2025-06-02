<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8fafc; margin: 0; padding: 0; }
        .container { max-width: 1200px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 32px; }
        h1 { font-size: 2rem; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { padding: 12px 10px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { background: #f1f5f9; font-weight: 600; }
        tr:last-child td { border-bottom: none; }
        .status { padding: 4px 12px; border-radius: 12px; font-size: 0.95rem; font-weight: 600; }
        .pending { background: #fef3c7; color: #b45309; }
        .completed { background: #d1fae5; color: #065f46; }
        .cancelled { background: #fee2e2; color: #991b1b; }
        .shipped { background: #bfdbfe; color: #1e40af; }
        .btn { background: #3b82f6; color: #fff; padding: 6px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: background 0.2s; }
        .btn:hover { background: #2563eb; }
        .success-msg { background: #d1fae5; color: #065f46; padding: 10px 16px; border-radius: 6px; margin-bottom: 18px; }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('admin.logout') }}" style="text-align:right;">
            @csrf
            <button type="submit" style="background:#ff4d2d;color:#fff;border:none;padding:8px 18px;border-radius:6px;font-weight:600;cursor:pointer;float:right;margin-bottom:18px;">Logout</button>
        </form>
        <h1>Order Management</h1>
        @if(session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td><span class="status {{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span></td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td><a href="{{ route('admin.order.detail', $order->id) }}" class="btn">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 