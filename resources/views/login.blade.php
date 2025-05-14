<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Tolit'Store</title>
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
    left: 10%;
    transform: translateY(-50%);
    z-index: 2;
    width: clamp(300px, 40%, 600px);
  }

  .login-box {
    background: #fff;
    padding: 110px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    width: 100%;
    margin-left: 150%;
  }

  .login-box h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
    font-size: 2rem;
  }

  .form-group {
    margin-bottom: 25px;
    
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    font-size: 1rem;
  }

  .form-group input {
    width: 96%;
    padding: 16px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 6px;
  }

  .btn-login {
    width: 102%;
    padding: 16px;
    background: #000;
    color: #fff;
    border: none;
    font-weight: bold;
    font-size: 1rem;
    border-radius: 6px;
    cursor: pointer;
  }

  .btn-login:hover {
    background: #333;
  }

  .login-box .extra {
    text-align: center;
    margin-top: 20px;
    font-size: 0.9rem;
  }

  .login-box .extra a {
    color: #000;
    text-decoration: none;
    font-weight: bold;
  }

  @media (max-width: 768px) {
    .login-overlay {
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      padding: 0 10px;
    }

    .login-box {
      padding: 100px;
    }

    .login-box h2 {
      font-size: 1.6rem;
    }

    .form-group input {
      padding: 14px;
    }

    .btn-login {
      padding: 14px;
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
        <form method="POST" action="">
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
          <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
