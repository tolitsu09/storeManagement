<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Shop.CO</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Helvetica Neue', sans-serif;
    }

    .register-page {
      position: relative;
      height: 100vh;
      width: 100%;
      overflow: hidden;
    }

    .register-background {
      background: url('{{ asset('images/hero.jpg') }}') no-repeat center center;
      background-size: cover;
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    .register-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      width: 100%;
      max-width: 600px;
      padding: 0 24px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-box {
      background: #fff;
      padding: 64px 48px;
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: bold;
      font-size: 2.5rem;
      width: 100%;
    }

    .form-group {
      margin-bottom: 32px;
      width: 100%;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 12px;
      font-size: 1.25rem;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 2.5rem;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }

    .btn-register {
      width: 100%;
      padding: 20px;
      background: #000;
      color: #fff;
      border: none;
      font-weight: bold;
      font-size: 1.25rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.2s;
    }

    .btn-register:hover {
      background: #333;
    }

    .register-box .extra {
      text-align: center;
      margin-top: 28px;
      font-size: 1.1rem;
      width: 100%;
    }

    .register-box .extra a {
      color: #000;
      text-decoration: none;
      font-weight: bold;
    }

    /* Responsive Styles */
    @media (max-width: 700px) {
      .register-overlay,
      .register-box {
        max-width: 98vw;
        padding: 16px 4vw;
      }
      .register-box {
        padding: 32px 8px;
      }
      .register-box h2 {
        font-size: 1.5rem;
      }
      .form-group label,
      .form-group input,
      .btn-register,
      .register-box .extra {
        font-size: 1rem;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="register-page">
    <div class="register-background"></div>
    <div class="register-overlay">
      <div class="register-box">
        <h2>Create an Account</h2>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="name">Full Name</label>
            <input id="name" type="text" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
          </div>
          <button class="btn-register" type="submit">Register</button>
        </form>
        <div class="extra">
          <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
