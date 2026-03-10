@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @include('components.alert')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ auth()->user()->name }}!</h1>
            <p class="mt-2 text-gray-600">Manage your account and view your recent activity.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Account Info -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Account Information</h2>
                <div class="space-y-2">
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Member since:</strong> {{ auth()->user()->created_at->format('M j, Y') }}</p>
                </div>
                <a href="#" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Edit Profile</a>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
                @if($recentOrders->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentOrders as $order)
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">Order #{{ $order->id }}</p>
                                    <p class="text-sm text-gray-600">{{ $order->created_at->format('M j, Y') }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <a href="#" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">View All Orders</a>
                @else
                    <p class="text-gray-600">No orders yet.</p>
                    <a href="{{ route('products.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Start Shopping</a>
                @endif
            </div>

            <!-- Cart Summary -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Shopping Cart</h2>
                @if(auth()->user()->cart && auth()->user()->cart->items->count() > 0)
                    <p class="text-gray-600 mb-2">{{ auth()->user()->cart->items->count() }} items in cart</p>
                    <p class="text-2xl font-bold text-indigo-600">${{ number_format(auth()->user()->cart->total, 2) }}</p>
                    <a href="{{ route('cart.index') }}" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">View Cart</a>
                @else
                    <p class="text-gray-600">Your cart is empty.</p>
                    <a href="{{ route('products.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Browse Products</a>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('products.index') }}" class="bg-indigo-600 text-white px-4 py-3 rounded-md hover:bg-indigo-700 transition-colors text-center">
                    Browse Products
                </a>
                <a href="{{ route('ai.modeling') }}" class="bg-purple-600 text-white px-4 py-3 rounded-md hover:bg-purple-700 transition-colors text-center">
                    AI Modeling
                </a>
                <a href="#" class="bg-green-600 text-white px-4 py-3 rounded-md hover:bg-green-700 transition-colors text-center">
                    View Orders
                </a>
            </div>
        </div>
    </div>
@endsection