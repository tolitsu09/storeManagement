<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Studio Wardrobe</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 0; 
      scroll-behavior: smooth; 
      background: #fff;
    }
    header, section, footer { 
      padding: 40px 32px; 
      max-width: 1800px;   /* Wider for landscape screens */
      margin: auto; 
      box-sizing: border-box;
      width: 100%;
    }
    .hero { 
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
      flex-wrap: wrap; 
      position: relative;
      gap: 48px;
    }
    .hero-text h1 { font-size: 48px; font-weight: bold; }
    .hero-text p { margin-top: 10px; max-width: 600px; font-size: 1.25rem; }
    .button { 
      background: black; 
      color: white; 
      padding: 16px 32px; 
      border: none; 
      margin-top: 20px; 
      cursor: pointer; 
      font-size: 1.1rem;
      border-radius: 4px;
      font-weight: 600;
    }
    .brands, .products, .categories, .testimonials { text-align: center; }
    .product-grid, .category-grid, .testimonial-grid { 
      display: grid; 
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); 
      gap: 32px; 
      margin-top: 20px; 
      width: 100%;
    }
    .product-grid img, .category-grid img {
      width: 100%;
      max-width: 260px;
      height: 200px;
      object-fit: cover;
      border-radius: 8px 8px 0 0;
      margin-bottom: 10px;
    }
    .product-grid p, .category-grid p {
      margin-top: 12px;
      font-size: 1.1rem;
      color: #333;
      font-weight: 500;
    }
    .testimonial-grid div {
      font-size: 1.1rem;
      color: #444;
      padding: 24px 12px;
    }
    .logout-form { display: inline; }
    .logout-btn { 
      background: #e53935; 
      color: #fff; 
      border: none; 
      padding: 12px 28px; 
      border-radius: 4px; 
      margin-left: 20px; 
      cursor: pointer; 
      font-weight: bold; 
      font-size: 1.1rem;
    }
    .logout-btn:hover { background: #b71c1c; }
    .header-actions { 
      display: flex; 
      align-items: center; 
      position: absolute;
      top: 32px;
      right: 32px;
      z-index: 10;
    }
    .hero-image img {
      max-width: 600px;
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    }
    footer {
      background: #222;
      color: #fff;
      padding: 60px 32px 40px;
      margin-top: 60px;
    }
    .footer-content {
      max-width: 1800px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 40px;
    }
    .footer-section h3 {
      font-size: 1.2rem;
      margin-bottom: 20px;
      font-weight: 600;
    }
    .footer-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-section ul li {
      margin-bottom: 12px;
    }
    .footer-section ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 0.95rem;
      opacity: 0.8;
      transition: opacity 0.2s;
    }
    .footer-section ul li a:hover {
      opacity: 1;
    }
    .footer-bottom {
      text-align: center;
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,0.1);
      font-size: 0.9rem;
      opacity: 0.8;
    }
    .social-links {
      display: flex;
      gap: 16px;
      margin-top: 15px;
    }
    .social-links a {
      color: #fff;
      font-size: 1.2rem;
      opacity: 0.8;
      transition: opacity 0.2s;
    }
    .social-links a:hover {
      opacity: 1;
    }
    @media (max-width: 1000px) {
      .footer-content {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (max-width: 600px) {
      .footer-content {
        grid-template-columns: 1fr;
        gap: 30px;
      }
      footer {
        padding: 40px 20px 30px;
      }
    }
    .newsletter input[type="email"] {
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      margin-right: 8px;
      width: 260px;
      max-width: 60vw;
    }
    .newsletter button {
      padding: 10px 20px;
      border-radius: 4px;
      border: none;
      background: #000;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s;
    }
    .newsletter button:hover { background: #222; }

    /* Profile Menu Styles */
    .profile-menu {
      position: relative;
      display: inline-block;
    }
    .profile-icon {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #222;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.3rem;
      cursor: pointer;
      border: 2px solid #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      transition: background 0.2s;
    }
    .profile-icon:hover {
      background: #444;
    }
    .profile-dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 54px;
      background: #fff;
      min-width: 160px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.12);
      border-radius: 8px;
      z-index: 100;
      padding: 8px 0;
    }
    .profile-menu.open .profile-dropdown {
      display: block;
    }
    .profile-dropdown a, .profile-dropdown form {
      display: block;
      width: 100%;
      padding: 12px 20px;
      color: #222;
      text-decoration: none;
      background: none;
      border: none;
      text-align: left;
      cursor: pointer;
      font-size: 1rem;
    }
    .profile-dropdown a:hover, .profile-dropdown form:hover {
      background: #f5f5f5;
    }

    /* Responsive Styles */
    @media (max-width: 1400px) {
      header, section, footer { max-width: 98vw; }
      .hero-image img { max-width: 400px; }
      .hero-text h1 { font-size: 36px; }
    }
    @media (max-width: 1000px) {
      .hero { flex-direction: column; align-items: flex-start; gap: 24px; }
      .hero-image { width: 100%; text-align: center; margin-top: 10px; }
      .hero-image img { max-width: 90vw; }
      .header-actions { top: 16px; right: 16px; }
      .product-grid, .category-grid, .testimonial-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 700px) {
      header, section, footer { padding: 16px 2vw; }
      .hero-text h1 { font-size: 1.5rem; }
      .button { padding: 10px 16px; font-size: 14px; }
      .logout-btn { padding: 8px 12px; font-size: 13px; }
      .hero-image img { max-width: 98vw; }
      .product-grid, .category-grid, .testimonial-grid { grid-template-columns: 1fr; }
      .newsletter input[type="email"] { width: 120px; }
      .header-actions { top: 8px; right: 8px; }
    }
    @media (max-width: 500px) {
      .hero-text h1 { font-size: 1.1rem; }
      footer { font-size: 12px; padding: 12px 2vw; }
    }

    .cart-icon {
      position: relative;
      margin-right: 20px;
      font-size: 1.5rem;
      color: #222;
      cursor: pointer;
    }

    .cart-count {
      position: absolute;
      top: -8px;
      right: -8px;
      background: #e53935;
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      font-size: 0.8rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .add-to-cart {
      background: #222;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.9rem;
      transition: background 0.2s;
    }

    .add-to-cart:hover {
      background: #444;
    }

    .product-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const menu = document.querySelector('.profile-menu');
    if(menu) {
      menu.addEventListener('click', function(e) {
        e.stopPropagation();
        menu.classList.toggle('open');
      });
      document.addEventListener('click', function() {
        menu.classList.remove('open');
      });
    }

    // SweetAlert for Add to Cart
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
      });
    @endif
  });
  </script>
</head>
<body>

<header class="hero">
  <div class="header-actions">
    @auth
      <a href="{{ route('cart') }}" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">{{ Auth::user()->cartItems()->count() }}</span>
      </a>
      <div class="profile-menu">
        <div class="profile-icon">
          {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
        </div>
        <div class="profile-dropdown">
          <a href="{{ route('profile') }}">Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;padding:0;margin:0;width:100%;text-align:left;color:#e53935;font-weight:bold;">Log Out</button>
          </form>
        </div>
      </div>
    @else
      <a href="{{ route('cart') }}" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">0</span>
      </a>
      <a href="{{ route('login') }}" class="button" style="margin: 0;">Login</a>
    @endauth
  </div>
  <div class="hero-text">
    <h1>Find Clothes That Match Your Style</h1>
    <p>Browse our diverse range of garments, designed to bring out your individuality.</p>
    <p style="margin-top: 20px;">200+ Brands | 2,000+ Products | 30,000+ Customers</p>
  </div>
  <div class="hero-image">
    <img src="{{ asset('images/hero.jpg') }}" alt="Hero" style="max-width: 400px;">
  </div>
</header>

<section class="brands">
  <div class="container">
    <div class="brand-logos">
      <img src="{{ asset('images/versace.png') }}" alt="Versace" class="logo-versace">
      <img src="{{ asset('images/zara.png') }}" alt="Zara" class="logo-zara">
      <img src="{{ asset('images/gucci.png') }}" alt="Gucci" class="logo-gucci">
      <img src="{{ asset('images/prada.png') }}" alt="Prada" class="logo-prada">
      <img src="{{ asset('images/calvin_klein.png') }}" alt="Calvin Klein" class="logo-calvin">
    </div>
  </div>
</section>

<section class="products">
  <div class="container">
    <h2>New Arrivals</h2>
    <div class="product-grid">
      <div class="product-card">
        <img src="{{ asset('images/product1.jpg') }}" alt="Product">
        <p>Long Sleeves - $120</p>
        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product_name" value="Long Sleeves">
          <input type="hidden" name="price" value="120">
          <input type="hidden" name="image_url" value="images/product1.jpg">
          <button type="submit" class="add-to-cart">Add to Cart</button>
        </form>
      </div>
      <div class="product-card">
        <img src="{{ asset('images/product2.jpg') }}" alt="Product">
        <p>Denim Jacket - $240</p>
        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product_name" value="Denim Jacket">
          <input type="hidden" name="price" value="240">
          <input type="hidden" name="image_url" value="images/product2.jpg">
          <button type="submit" class="add-to-cart">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="products">
  <h2>Top Selling</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="{{ asset('images/top1.jpg') }}" alt="Product">
      <p>Leather Jacket - $212</p>
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_name" value="Leather Jacket">
        <input type="hidden" name="price" value="212">
        <input type="hidden" name="image_url" value="images/top1.jpg">
        <button type="submit" class="add-to-cart">Add to Cart</button>
      </form>
    </div>
    <div class="product-card">
      <img src="{{ asset('images/top2.jpg') }}" alt="Product">
      <p>Courage Graphic T-shirt - $145</p>
      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_name" value="Courage Graphic T-shirt">
        <input type="hidden" name="price" value="145">
        <input type="hidden" name="image_url" value="images/top2.jpg">
        <button type="submit" class="add-to-cart">Add to Cart</button>
      </form>
    </div>
  </div>
</section>

<section class="categories">
  <h2>Browse by Dress Style</h2>
  <div class="category-grid">
    <div><img src="{{ asset('images/casual.jpg') }}" alt="Casual"><p>Casual</p></div>
    <div><img src="{{ asset('images/formal.jpg') }}" alt="Formal"><p>Formal</p></div>
    <div><img src="{{ asset('images/party.jpg') }}" alt="Party"><p>Party</p></div>
    <div><img src="{{ asset('images/gym.jpg') }}" alt="Gym"><p>Gym</p></div>
  </div>
</section>


<footer>
  <div class="footer-content">
    <div class="footer-section">
      <h3>About Us</h3>
      <ul>
        <li><a href="#">Our Story</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Store Locations</a></li>
        <li><a href="#">Sustainability</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3>Customer Service</h3>
      <ul>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Shipping & Returns</a></li>
        <li><a href="#">Size Guide</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">Best Sellers</a></li>
        <li><a href="#">Sale</a></li>
        <li><a href="#">Gift Cards</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Connect With Us</h3>
      <ul>
        <li><a href="#">+1 (234) 567-8900</a></li>
        <li><a href="#">support@tolitstore.com</a></li>
        <li><a href="#">123 Fashion Street</a></li>
      </ul>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Tolit'Store. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
