<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Wardrobe</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans antialiased bg-white">
    <!-- Navigation -->
    <nav class="container mx-auto py-4 px-4 lg:px-8">
        <div class="flex items-center justify-between gap-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/landing') }}" class="text-black font-bold text-2xl">Studio Wardrobe</a>
            </div>
            <!-- Middle Nav Items - Hidden on mobile -->
            <div class="hidden md:flex items-center gap-6 ml-8">
                <div class="relative group">
                    <a href="#" class="text-gray-800 hover:text-black flex items-center font-medium">
                        Shop
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                </div>
                <a href="#new-arrivals" class="text-gray-800 hover:text-black font-medium scroll-smooth">New Arrivals</a>
                <a href="#brands" class="text-gray-800 hover:text-black font-medium scroll-smooth">Brands</a>
                <a href="#about" class="text-gray-800 hover:text-black font-medium scroll-smooth">About</a>
            </div>            <!-- Search and Icons -->
            <div class="flex items-center space-x-8">
                <!-- Search bar -->
                <div class="hidden md:flex items-center relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Search for products..." class="bg-gray-100 rounded-full pl-4 pr-4 py-2 w-64 focus:outline-none text-sm" />
                </div>
                <!-- Cart and Account Icons -->
                <div class="flex items-center space-x-4 relative" x-data="{ open: false }">
                    <a href="#" class="text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
                    @auth
                    <!-- Account Icon with Dropdown -->
                    <button @click="open = !open" class="text-black focus:outline-none" aria-label="Account options">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg py-2 z-50">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Change Password</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                    @endauth
                </div>
                <!-- Mobile menu button -->
                <button class="md:hidden text-black focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="bg-gray-100 py-12 md:py-16 lg:py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Left content -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0 pr-0 md:pr-8">
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-none mb-4">
                        FIND CLOTHES<br>
                        THAT MATCHES<br>
                        YOUR STYLE
                    </h1>
                    <p class="text-gray-600 mb-8 max-w-lg">
                        Browse through our diverse range of meticulously crafted garments, designed
                        to bring out your individuality and cater to your sense of style.
                    </p>
                    <button class="bg-black text-white font-medium px-8 py-3 rounded-full hover:bg-gray-800 transition duration-300">
                        Shop Now
                    </button>
                    <!-- Stats -->
                    <div class="flex flex-wrap mt-12 md:mt-16">
                        <div class="w-1/3 pr-4 border-r border-gray-300">
                            <div class="font-bold text-2xl md:text-3xl">200+</div>
                            <div class="text-sm text-gray-600">International Brands</div>
                        </div>
                        <div class="w-1/3 px-4 border-r border-gray-300">
                            <div class="font-bold text-2xl md:text-3xl">2,000+</div>
                            <div class="text-sm text-gray-600">High-Quality Products</div>
                        </div>
                        <div class="w-1/3 pl-4">
                            <div class="font-bold text-2xl md:text-3xl">30,000+</div>
                            <div class="text-sm text-gray-600">Happy Customers</div>
                        </div>
                    </div>
                </div>
                <!-- Right image -->
                <div class="w-full md:w-1/2 relative flex justify-center items-center">
                    <img src="{{ asset('images/hero.jpg') }}" alt="Fashion models" class="w-full max-w-md rounded-lg shadow-lg">
                    <!-- Star decorations -->
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Banner -->
    <section class="bg-black py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/2 sm:w-1/5 px-2 md:px-4 mb-4 sm:mb-0 flex justify-center">
                    <img src="{{ asset('images/versace.png') }}" alt="Versace" class="h-8 md:h-10 opacity-80 filter brightness-0 invert">
                </div>
                <div class="w-1/2 sm:w-1/5 px-2 md:px-4 mb-4 sm:mb-0 flex justify-center">
                    <img src="{{ asset('images/zara.png') }}" alt="Zara" class="h-8 md:h-10 opacity-80 filter brightness-0 invert">
                </div>
                <div class="w-1/2 sm:w-1/5 px-2 md:px-4 mb-4 sm:mb-0 flex justify-center">
                    <img src="{{ asset('images/gucci.png') }}" alt="Gucci" class="h-8 md:h-10 opacity-80 filter brightness-0 invert">
                </div>
                <div class="w-1/2 sm:w-1/5 px-2 md:px-4 flex justify-center">
                    <img src="{{ asset('images/prada.png') }}" alt="Prada" class="h-8 md:h-10 opacity-80 filter brightness-0 invert">
                </div>
                <div class="w-1/2 sm:w-1/5 px-2 md:px-4 flex justify-center">
                    <img src="{{ asset('images/calvin_klein.png') }}" alt="Calvin Klein" class="h-8 md:h-10 opacity-80 filter brightness-0 invert">
                </div>
            </div>
        </div>
    </section>
    <!-- New Arrivals Section -->
    <section id="new-arrivals" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-black text-center mb-12 tracking-tight">NEW ARRIVALS</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <!-- Product 1 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/top1.jpg" alt="T-shirt with Tape Details" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">T-shirt with Tape Details</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">4.5/5</span>
                        </div>
                        <div class="font-bold text-2xl">$120</div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/top2.jpg" alt="Skinny Fit Jeans" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Skinny Fit Jeans</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">3.5/5</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="font-bold text-2xl">$240</span>
                            <span class="text-gray-400 line-through text-lg">$260</span>
                            <span class="bg-red-100 text-red-500 text-xs font-semibold px-2 py-0.5 rounded-full">-20%</span>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/bottom3.jpg" alt="Checkered Shirt" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Checkered Shirt</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">4.5/5</span>
                        </div>
                        <div class="font-bold text-2xl">$180</div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/bottom4.jpg" alt="Sleeve Striped T-shirt" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Sleeve Striped T-shirt</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">4.5/5</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="font-bold text-2xl">$130</span>
                            <span class="text-gray-400 line-through text-lg">$160</span>
                            <span class="bg-red-100 text-red-500 text-xs font-semibold px-2 py-0.5 rounded-full">-30%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <button class="border border-gray-300 rounded-full px-8 py-2 text-gray-700 font-medium hover:bg-gray-100 transition">View All</button>
            </div>
        </div>
    </section>
    <!-- Top Selling Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-black text-center mb-12 tracking-tight">TOP SELLING</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <!-- Product 1 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/product1.jpg" alt="Vertical Striped Shirt" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Vertical Striped Shirt</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">5.0/5</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="font-bold text-2xl">$212</span>
                            <span class="text-gray-400 line-through text-lg">$232</span>
                            <span class="bg-red-100 text-red-500 text-xs font-semibold px-2 py-0.5 rounded-full">-20%</span>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/product2.jpg" alt="Courage Graphic T-shirt" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Courage Graphic T-shirt</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">4.0/5</span>
                        </div>
                        <div class="font-bold text-2xl">$145</div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/product3.jpg" alt="Loose Fit Bermuda Shorts" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Loose Fit Bermuda Shorts</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">3.0/5</span>
                        </div>
                        <div class="font-bold text-2xl">$80</div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="bg-gray-100 rounded-2xl p-6 flex flex-col items-center">
                    <img src="/images/product4.jpg" alt="Faded Skinny Jeans" class="w-40 h-40 object-contain mb-4">
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">Faded Skinny Jeans</div>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-400 flex items-center mr-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            </span>
                            <span class="text-gray-500 text-sm ml-2">4.5/5</span>
                        </div>
                        <div class="font-bold text-2xl">$210</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <button class="border border-gray-300 rounded-full px-8 py-2 text-gray-700 font-medium hover:bg-gray-100 transition">View All</button>
            </div>
        </div>
    </section>
    <!-- Browse by Dress Style Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl p-8 md:p-12 shadow flex flex-col items-center">
                <h2 class="text-3xl md:text-4xl font-black text-center mb-10 tracking-tight">BROWSE BY DRESS STYLE</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full">
                    <div class="flex flex-col gap-6 w-full">
                        <div class="bg-gray-100 rounded-2xl overflow-hidden flex-1 relative aspect-[4/3]">
                            <img src="/images/casual.jpg" alt="Casual" class="absolute inset-0 w-full h-full object-cover" />
                            <span class="absolute top-4 left-4 z-10 text-2xl md:text-3xl font-semibold text-black bg-white/70 px-4 py-2 rounded-lg">Casual</span>
                        </div>
                        <div class="bg-gray-100 rounded-2xl overflow-hidden flex-1 relative aspect-[4/3]">
                            <img src="/images/party.jpg" alt="Party" class="absolute inset-0 w-full h-full object-cover" />
                            <span class="absolute top-4 left-4 z-10 text-2xl md:text-3xl font-semibold text-black bg-white/70 px-4 py-2 rounded-lg">Party</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6 w-full">
                        <div class="bg-gray-100 rounded-2xl overflow-hidden flex-1 relative aspect-[4/3]">
                            <img src="/images/formal.jpg" alt="Formal" class="absolute inset-0 w-full h-full object-cover" />
                            <span class="absolute top-4 left-4 z-10 text-2xl md:text-3xl font-semibold text-black bg-white/70 px-4 py-2 rounded-lg">Formal</span>
                        </div>
                        <div class="bg-gray-100 rounded-2xl overflow-hidden flex-1 relative aspect-[4/3]">
                            <img src="/images/gym.jpg" alt="Gym" class="absolute inset-0 w-full h-full object-cover" />
                            <span class="absolute top-4 left-4 z-10 text-2xl md:text-3xl font-semibold text-black bg-white/70 px-4 py-2 rounded-lg">Gym</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Happy Customers Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-black text-center mb-12 tracking-tight">OUR HAPPY CUSTOMERS</h2>
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-stretch">
                <!-- Testimonial 1 -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 flex-1 min-w-[260px] max-w-sm">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 flex items-center mr-2">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                        </span>
                    </div>
                    <div class="font-bold text-lg mb-1 flex items-center">Sarah M. <svg class="w-4 h-4 ml-1 text-green-500 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"/></svg></div>
                    <div class="text-gray-500 text-sm">“I'm blown away by the quality and style of the clothes I received from Studio Wardrobe. From casual wear to elegant dresses, every piece I've bought has exceeded my expectations.”</div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 flex-1 min-w-[260px] max-w-sm">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 flex items-center mr-2">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                        </span>
                    </div>
                    <div class="font-bold text-lg mb-1 flex items-center">Alex K. <svg class="w-4 h-4 ml-1 text-green-500 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"/></svg></div>
                    <div class="text-gray-500 text-sm">“Finding clothes that align with my personal style used to be a challenge until I discovered Studio Wardrobe. The range of options they offer is truly remarkable, catering to a variety of tastes and occasions.”</div>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 flex-1 min-w-[260px] max-w-sm">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 flex items-center mr-2">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.6 6,11.9 4.8,17.8 9.9,14.8 15,17.8 13.8,11.9 18.2,7.6 12.2,6.6 "/></svg>
                        </span>
                    </div>
                    <div class="font-bold text-lg mb-1 flex items-center">James L. <svg class="w-4 h-4 ml-1 text-green-500 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"/></svg></div>
                    <div class="text-gray-500 text-sm">“As someone who's always on the lookout for unique fashion pieces, I'm thrilled to have stumbled upon Studio Wardrobe. The selection of clothes is not only diverse but also on-point with the latest trends.”</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-black rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-white text-2xl md:text-3xl font-black mb-6 md:mb-0 md:w-1/2 leading-tight">STAY UPTO DATE ABOUT<br>OUR LATEST OFFERS</div>
                <form class="flex flex-col md:flex-row items-center gap-4 md:w-1/2">
                    <div class="relative w-full md:w-auto flex-1">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </span>
                        <input type="email" placeholder="Enter your email address" class="pl-12 pr-4 py-3 rounded-full w-full focus:outline-none text-black" required>
                    </div>
                    <button type="submit" class="bg-white text-black font-semibold px-8 py-3 rounded-full hover:bg-gray-100 transition">Subscribe to Newsletter</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="bg-gray-100 pt-16 pb-8 mt-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between gap-12">
                <div class="md:w-1/4 mb-8 md:mb-0">
                    <div class="text-2xl font-black mb-4">Studio Wardrobe</div>
                    <div class="text-gray-500 mb-4">We have clothes that suits your style and which you're proud to wear. From women to men.</div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-black hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.59-2.47.7a4.3 4.3 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04A4.28 4.28 0 0016.11 4c-2.37 0-4.29 1.92-4.29 4.29 0 .34.04.67.11.99C7.69 8.99 4.07 7.13 1.64 4.15c-.37.64-.58 1.38-.58 2.17 0 1.5.76 2.82 1.92 3.6a4.28 4.28 0 01-1.94-.54v.05c0 2.1 1.5 3.85 3.5 4.25-.36.1-.74.16-1.13.16-.28 0-.54-.03-.8-.08.54 1.7 2.1 2.94 3.95 2.97A8.6 8.6 0 012 19.54a12.13 12.13 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.38-.01-.57A8.7 8.7 0 0024 4.59a8.5 8.5 0 01-2.54.7z"/></svg></a>
                        <a href="#" class="text-black hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 3.6 8.06 8.24 8.93v-6.32h-2.48v-2.61h2.48V9.41c0-2.45 1.49-3.8 3.77-3.8 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.61h-2.34v6.32c4.64-.87 8.24-4.52 8.24-8.93 0-5.5-4.46-9.96-9.96-9.96z"/></svg></a>
                        <a href="#" class="text-black hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M21.35 11.1c0-5.05-4.1-9.15-9.15-9.15S3.05 6.05 3.05 11.1c0 4.54 3.3 8.3 7.65 9.07v-6.42h-2.3v-2.65h2.3V9.41c0-2.28 1.37-3.54 3.47-3.54.99 0 2.03.18 2.03.18v2.23h-1.14c-1.13 0-1.48.7-1.48 1.42v1.7h2.52l-.4 2.65h-2.12v6.42c4.35-.77 7.65-4.53 7.65-9.07z"/></svg></a>
                        <a href="#" class="text-black hover:text-gray-700"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 3.6 8.06 8.24 8.93v-6.32h-2.48v-2.61h2.48V9.41c0-2.45 1.49-3.8 3.77-3.8 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.61h-2.34v6.32c4.64-.87 8.24-4.52 8.24-8.93 0-5.5-4.46-9.96-9.96-9.96z"/></svg></a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 flex-1">
                    <div>
                        <div class="font-semibold mb-4">COMPANY</div>
                        <ul class="text-gray-500 space-y-2 text-sm">
                            <li><a href="#" class="hover:text-black">About</a></li>
                            <li><a href="#" class="hover:text-black">Features</a></li>
                            <li><a href="#" class="hover:text-black">Works</a></li>
                            <li><a href="#" class="hover:text-black">Career</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="font-semibold mb-4">HELP</div>
                        <ul class="text-gray-500 space-y-2 text-sm">
                            <li><a href="#" class="hover:text-black">Customer Support</a></li>
                            <li><a href="#" class="hover:text-black">Delivery Details</a></li>
                            <li><a href="#" class="hover:text-black">Terms & Conditions</a></li>
                            <li><a href="#" class="hover:text-black">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="font-semibold mb-4">FAQ</div>
                        <ul class="text-gray-500 space-y-2 text-sm">
                            <li><a href="#" class="hover:text-black">Account</a></li>
                            <li><a href="#" class="hover:text-black">Manage Deliveries</a></li>
                            <li><a href="#" class="hover:text-black">Orders</a></li>
                            <li><a href="#" class="hover:text-black">Payments</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="font-semibold mb-4">RESOURCES</div>
                        <ul class="text-gray-500 space-y-2 text-sm">
                            <li><a href="#" class="hover:text-black">Free eBooks</a></li>
                            <li><a href="#" class="hover:text-black">Development Tutorial</a></li>
                            <li><a href="#" class="hover:text-black">How to - Blog</a></li>
                            <li><a href="#" class="hover:text-black">Youtube Playlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
