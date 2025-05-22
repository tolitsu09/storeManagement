<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Studio Wardrobe</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: 'Helvetica Neue', sans-serif;
  }

  .login-page {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
  }

  .login-background {
    background: url('{{ asset('images/hero.jpg') }}') no-repeat center center;
    background-size: cover;
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

  .login-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 100%;
    max-width: 600px; /* Increased from 400px */
    padding: 0 24px;  /* Increased padding */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .login-box {
    background: #fff;
    padding: 64px 48px; /* Increased padding */
    border-radius: 16px; /* Slightly larger radius */
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18); /* Larger shadow */
    width: 100%;
    max-width: 600px; /* Increased from 400px */
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .login-box h2 {
    text-align: center;
    margin-bottom: 40px;
    font-weight: bold;
    font-size: 2.5rem; /* Larger font */
    width: 100%;
  }

  .form-group {
    margin-bottom: 32px; /* More space */
    width: 100%;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 12px;
    font-size: 1.25rem; /* Larger label */
  }

  .form-group input {
    width: 100%;
    padding: 10px;
    font-size: 2.5rem; /* Larger input */
    border: 1.5px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
  }

  .btn-login {
    width: 100%;
    padding: 20px;
    background: #000;
    color: #fff;
    border: none;
    font-weight: bold;
    font-size: 1.25rem; /* Larger button */
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-login:hover {
    background: #333;
  }

  .login-box .extra {
    text-align: center;
    margin-top: 28px;
    font-size: 1.1rem; /* Larger text */
    width: 100%;
  }

  .login-box .extra a {
    color: #000;
    text-decoration: none;
    font-weight: bold;
  }

  /* Responsive Styles */
  @media (max-width: 700px) {
    .login-overlay,
    .login-box {
      max-width: 98vw;
      padding: 16px 4vw;
    }
    .login-box {
      padding: 32px 8px;
    }
    .login-box h2 {
      font-size: 1.5rem;
    }
    .form-group label,
    .form-group input,
    .btn-login,
    .login-box .extra {
      font-size: 1rem;
      padding: 12px;
    }
  }
</style>

</head>
<body>
  <div class="login-page">
    <div class="login-background"></div>
    <div class="login-overlay">
      <div class="login-box">
        <h2>Login to Tolit'Store</h2>
        <form method="POST" action="{{ route('customer.login.submit') }}">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
          </div>

          <button class="btn-login" type="submit">Log In</button>
        </form>
        <div class="extra">
          <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
