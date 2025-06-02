<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
        @if(session('error'))
            <div class="mb-4 text-red-600 text-sm">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" name="email" required autofocus class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black">
            </div>
            <button type="submit" class="w-full bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition">Login</button>
        </form>
    </div>
</div>
