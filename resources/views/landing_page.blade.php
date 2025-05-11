<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tolit'Store</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; scroll-behavior: smooth; }
    header, section, footer { padding: 40px 20px; max-width: 1200px; margin: auto; }
    .hero { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
    .hero-text h1 { font-size: 36px; font-weight: bold; }
    .hero-text p { margin-top: 10px; max-width: 400px; }
    .button { background: black; color: white; padding: 12px 24px; border: none; margin-top: 20px; cursor: pointer; }
    .brands, .products, .categories, .testimonials { text-align: center; }
    .product-grid, .category-grid, .testimonial-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
    footer { background: #f4f4f4; padding: 20px; font-size: 14px; }
  </style>
</head>
<body>

<header class="hero">
  <div class="hero-text">
    <h1>Find Clothes That Match Your Style</h1>
    <p>Browse our diverse range of garments, designed to bring out your individuality.</p>
    <button class="button">Shop Now</button>
    <p style="margin-top: 20px;">200+ Brands | 2,000+ Products | 30,000+ Customers</p>
  </div>
  <div class="hero-image">
    {{-- Replace with your image --}}
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
      <div>
        <img src="{{ asset('images/product1.jpg') }}" alt="Product">
        <p>Long Sleeves - $120</p>
      </div>
      <div>
        <img src="{{ asset('images/product2.jpg') }}" alt="Product">
        <p>Denim Jacket - $240</p>
      </div>
    </div>
  </div>
</section>


<section class="products">
  <h2>Top Selling</h2>
  <div class="product-grid">
    <div>
      <img src="{{ asset('images/top1.jpg') }}" alt="Product">
      <p>Leather Jacket - $212</p>
    </div>
    <div>
      <img src="{{ asset('images/top2.jpg') }}" alt="Product">
      <p>Courage Graphic T-shirt - $145</p>
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

<section class="testimonials">
  <h2>Our Happy Customers</h2>
  <div class="testimonial-grid">
    <div><p>"Exceeded my expectations!" - Sarah M.</p></div>
    <div><p>"Found my style with Shop.CO!" - Alex K.</p></div>
    <div><p>"Stylish and comfortable clothes." - James L.</p></div>
  </div>
</section>

<footer>
  <div class="newsletter">
    <h4>Subscribe to Our Newsletter</h4>
    <form>
      <input type="email" placeholder="Enter your email" style="padding: 8px;">
      <button class="button" type="submit">Subscribe</button>
    </form>
  </div>
  <p>© 2025 Shop.CO. All rights reserved.</p>
</footer>

</body>
</html>
