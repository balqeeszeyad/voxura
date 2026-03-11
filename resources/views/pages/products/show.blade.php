@extends('layouts.app')

@section('title', $product->name)

@section('content')
    @include('components.alert')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div>
                <img src="{{ $product->image ?? 'https://via.placeholder.com/600x600?text=Product' }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-md">
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                <p class="text-2xl font-semibold text-indigo-600 mb-6">${{ number_format($product->price, 2) }}</p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>

                @if($product->category)
                    <div class="mb-6">
                        <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">
                            {{ $product->category->name }}
                        </span>
                    </div>
                @endif

                <div class="flex space-x-4">
                    <form method="POST" action="{{ route('cart.add', $product) }}" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors font-semibold">
                            Add to Cart
                        </button>
                    </form>
                    <button class="bg-gray-200 text-gray-800 px-6 py-3 rounded-md hover:bg-gray-300 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-8">Related Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        @include('components.product-card', ['product' => $relatedProduct])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection