<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile - Tolit'Store</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    body { font-family: Arial, sans-serif; background: #f8f8f8; margin: 0; }
    .profile-container {
      max-width: 480px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
      padding: 40px 32px;
    }
    h2 { text-align: center; margin-bottom: 32px; }
    .form-group { margin-bottom: 24px; }
    .form-group label { display: block; font-weight: bold; margin-bottom: 8px; }
    .form-group input {
      width: 100%;
      padding: 14px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }
    .btn-save {
      width: 100%;
      padding: 14px;
      background: #000;
      color: #fff;
      border: none;
      font-weight: bold;
      font-size: 1.1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.2s;
      margin-bottom: 12px;
    }
    .btn-save:hover { background: #222; }
    .btn-back {
      width: 94%;
      padding: 14px;
      background: #f4f4f4;
      color: #222;
      border: 1px solid #ccc;
      font-weight: bold;
      font-size: 1.1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.2s;
      text-align: center;
      display: block;
      text-decoration: none;
    }
    .btn-back:hover { background: #e0e0e0; }
    .success-message { color: #388e3c; text-align: center; margin-bottom: 16px; }
    .error-message { color: #e53935; text-align: center; margin-bottom: 16px; }
  </style>
</head>
<body>
  <div class="profile-container">
    <h2>Edit Profile</h2>
    @if(session('success'))
      <div class="success-message">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="error-message">
        @foreach($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required>
      </div>
      <hr style="margin: 24px 0;">
      <div class="form-group">
        <label for="password">New Password <span style="font-weight:normal;color:#888;">(leave blank to keep current)</span></label>
        <input id="password" name="password" type="password" autocomplete="new-password">
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
      </div>
      <button class="btn-save" type="submit">Save Changes</button>
    </form>
    <a href="{{ url('/') }}" class="btn-back">Back to Home</a>
  </div>
</body>
</html>