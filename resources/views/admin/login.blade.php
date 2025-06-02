<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #181818;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px; /* for mobile spacing */
        }
        .login-card {
            background: #232323;
            border-radius: 18px;
            box-shadow: 0 4px 32px rgba(0,0,0,0.25);
            padding: 48px 36px 36px 36px;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
        }
        .login-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6a3d, #ffb86c);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }
        .login-logo span {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 28px;
            text-align: center;
        }
        .form-group {
            width: 100%;
            margin-bottom: 22px;
        }
        .form-group label {
            color: #bbb;
            font-size: 1rem;
            margin-bottom: 6px;
            display: block;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px 12px 14px;
            border-radius: 8px;
            border: 1.5px solid #333;
            background: #181818;
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: border 0.2s;
        }
        .form-group input:focus {
            border: 1.5px solid #ff6a3d;
        }
        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1.1rem;
            cursor: pointer;
        }
        .input-wrapper {
            position: relative;
        }
        .forgot-link {
            color: #ff6a3d;
            font-size: 0.97rem;
            text-decoration: none;
            float: right;
            margin-top: 4px;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }
        .btn-login {
            width: 100%;
            background: #ff4d2d;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px 0;
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 18px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-login:hover {
            background: #ff6a3d;
        }
        .divider {
            width: 100%;
            text-align: center;
            color: #888;
            margin: 18px 0 10px 0;
            position: relative;
        }
        .divider:before, .divider:after {
            content: '';
            display: inline-block;
            width: 40%;
            height: 1px;
            background: #333;
            vertical-align: middle;
            margin: 0 8px;
        }
        .btn-google {
            width: 100%;
            background: #181818;
            color: #fff;
            border: 1.5px solid #333;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            margin-bottom: 18px;
            transition: background 0.2s, border 0.2s;
        }
        .btn-google:hover {
            background: #232323;
            border: 1.5px solid #ff6a3d;
        }
        .signup-link {
            color: #bbb;
            font-size: 1rem;
            text-align: center;
        }
        .signup-link a {
            color: #ff6a3d;
            text-decoration: none;
            font-weight: 600;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <span>W</span>
        </div>
        <h2>Log In to your account</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" required autofocus placeholder="Email" style="padding-left: 25px;">
                    <i class="fas fa-envelope input-icon" style="position: absolute; left: 260px;"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required placeholder="Password"style="padding-left: 25px;">
                    <i class="fas fa-eye input-icon" id="togglePassword" style="cursor:pointer; position: absolute; left: 260px;"></i>
                </div>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>
            <button type="submit" class="btn-login" >Log In</button>
        </form>
        @if($errors->any())
            <div style="color: #ff6a3d; margin-bottom: 12px; text-align:center;">
                {{ $errors->first() }}
            </div>
        @endif
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const pwd = document.getElementById('password');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                pwd.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html> 