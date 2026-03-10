<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                        Voxura
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('home') ? 'border-indigo-400 text-gray-900' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('products.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                        Products
                    </a>
                    <a href="{{ route('ai.modeling') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('ai-modeling') ? 'border-indigo-400 text-gray-900' : '' }}">
                        AI Modeling
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <a href="{{ route('cart.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                        Cart ({{ auth()->user()->cart->items->count() ?? 0 }})
                    </a>
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-gray-500 hover:text-gray-700">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>