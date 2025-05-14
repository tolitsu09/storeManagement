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

    .register-container {
      display: flex;
      height: 100vh;
    }

    .register-left {
      flex: 1;
      background: url('{{ asset('images/hero.jpg') }}') no-repeat center center;
      background-size: cover;
    }

    .register-right {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background-color: #f9f9f9;
    }

    .register-box {
      width: 100%;
      max-width: 450px;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
      margin-right: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn-register {
      width: 102%;
      padding: 12px;
      background: #000;
      color: #fff;
      border: none;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-register:hover {
      background: #333;
    }

    .register-box .extra {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .register-box .extra a {
      color: #000;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="register-container">
  <div class="register-left"></div>
  <div class="register-right">
    <div class="register-box">
      <h2>Create an Account</h2>
      <form method="POST" action="#">
        {{-- Later, update this to route('register') --}}
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
        <p>Already have an account? <a href="">Log in</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
