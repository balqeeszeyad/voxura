@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    @include('components.alert')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Billing Information -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Billing Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" id="address" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('address') }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city" value="{{ old('city') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="zip" class="block text-sm font-medium text-gray-700">ZIP Code</label>
                                <input type="text" name="zip" id="zip" value="{{ old('zip') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        @foreach($cart->items as $item)
                            <div class="flex justify-between items-center py-2">
                                <div>
                                    <p class="font-medium">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-semibold">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                            </div>
                        @endforeach
                        <div class="border-t mt-4 pt-4">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>${{ number_format($cart->total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span>$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax</span>
                                <span>${{ number_format($cart->total * 0.08, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-lg font-semibold mt-2">
                                <span>Total</span>
                                <span>${{ number_format($cart->total * 1.08, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors font-semibold mt-6">
                        Place Order
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection