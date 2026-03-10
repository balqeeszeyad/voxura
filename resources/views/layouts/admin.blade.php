<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Voxura') }} Admin - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200' : '' }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('admin.products.*') ? 'bg-gray-200' : '' }}">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-200' : '' }}">Orders</a>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1">
            <header class="bg-white shadow-sm px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-semibold">@yield('title')</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                    </form>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>