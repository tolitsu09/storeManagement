<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Complete - Tolit'Store</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .complete-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            color: white;
            font-size: 40px;
        }

        h1 {
            color: #1e293b;
            font-size: 24px;
            margin: 0 0 16px 0;
        }

        p {
            color: #64748b;
            margin: 0 0 24px 0;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>
    <div class="complete-container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h1>Order Complete!</h1>
        <p>Thank you for your purchase. Your order has been successfully processed and will be shipped soon.</p>
        <a href="{{ url('/') }}" class="btn">Continue Shopping</a>
    </div>
</body>
</html> 