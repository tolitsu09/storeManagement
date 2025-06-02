<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Tolit'Store</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f8fafc;
            min-height: 100vh;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .stepper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
            position: relative;
        }

        .step {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .step:not(:last-child) {
            margin-right: 80px;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 12px;
            color: #64748b;
        }

        .step.active .step-number {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .step.completed .step-number {
            background: #10b981;
            border-color: #10b981;
            color: white;
        }

        .step-label {
            font-size: 0.95rem;
            color: #64748b;
        }

        .step.active .step-label {
            color: #3b82f6;
            font-weight: 600;
        }

        .step-line {
            position: absolute;
            top: 16px;
            left: 50%;
            transform: translateX(-50%);
            height: 2px;
            background: #e2e8f0;
            width: 80%;
            z-index: 0;
        }

        .checkout-form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h1 {
            font-size: 1.875rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0 0 8px 0;
        }

        .form-header p {
            color: #64748b;
            margin: 0;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .card-number-group {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .expiry-cvv-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .discount-group {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 12px;
            align-items: start;
        }

        .btn {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            font-size: 1rem;
        }

        .btn:hover {
            background: #2563eb;
        }

        .btn-apply {
            background: white;
            color: #3b82f6;
            border: 1px solid #3b82f6;
            padding: 10px 20px;
        }

        .btn-apply:hover {
            background: #f8fafc;
        }

        .payment-summary {
            background: #f8fafc;
            padding: 24px;
            border-radius: 8px;
            margin-top: 32px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: #64748b;
        }

        .payment-total {
            border-top: 1px solid #e2e8f0;
            margin-top: 12px;
            padding-top: 12px;
            font-weight: 600;
            color: #1e293b;
        }

        @media (max-width: 640px) {
            .stepper {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .step:not(:last-child) {
                margin-right: 0;
            }

            .step-line {
                display: none;
            }

            .checkout-form {
                padding: 20px;
            }

            .card-number-group {
                grid-template-columns: 1fr;
            }

            .expiry-cvv-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <div class="stepper">
            <div class="step-line"></div>
            <div class="step completed">
                <div class="step-number">1</div>
                <div class="step-label">Personal detail</div>
            </div>
            <div class="step active">
                <div class="step-number">2</div>
                <div class="step-label">Payment</div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-label">Complete</div>
            </div>
        </div>

        <form class="checkout-form" method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div class="form-header">
                <h1>Complete Your Payment</h1>
                <p>To complete your payment, please proceed with the payment using a valid credit or debit card.</p>
            </div>

            <div class="form-group">
                <label for="card_number">Gcash Number</label>
                <div class="card-number-group">
                    <input type="text" maxlength="11" placeholder="099999999999" required>
                  
                </div>
            </div>

            

                

            <div class="form-group">
                <label for="discount">Discount code</label>
                <form method="POST" action="{{ route('checkout.applyDiscount') }}" class="discount-group" style="margin:0;padding:0;">
                    @csrf
                    <input type="text" id="discount" name="discount_code" placeholder="C200-00-OFF" value="{{ old('discount_code', $discountCode) }}">
                    <button type="submit" class="btn btn-apply">Apply</button>
                </form>
                @if($discountCode && $discount > 0)
                    <div style="color: #10b981; margin-top: 8px; font-size: 0.95rem;">Code '{{ $discountCode }}' applied! -$${{ number_format($discount, 2) }}</div>
                @endif
            </div>

            <div class="payment-summary">
                <div class="payment-row">
                    <span>Subtotal</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div class="payment-row" style="color: #10b981; font-weight: 600;">
                    <span>Discount{{ $discountCode ? ' (' . strtoupper($discountCode) . ')' : '' }}</span>
                    <span>- ${{ number_format($discount, 2) }}</span>
                </div>
                <div class="payment-row payment-total" style="font-size: 1.3rem; color: #1e293b;">
                    <span>Total to Pay</span>
                    <span>${{ number_format($finalTotal, 2) }}</span>
                </div>
            </div>

            <div style="text-align: center; margin-top: 32px;">
                <button type="submit" class="btn">Pay Now</button>
            </div>
        </form>
    </div>

    <script>
        // Auto-focus next input in card number group
        document.querySelectorAll('.card-number-group input').forEach((input, index, inputs) => {
            input.addEventListener('input', function() {
                if (this.value.length === 4 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
        });

        // Format expiry date
        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0,2) + '/' + value.slice(2);
            }
            e.target.value = value.slice(0,5);
        });

        // SweetAlert for discount code
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
</body>
</html> 