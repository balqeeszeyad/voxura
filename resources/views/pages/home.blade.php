@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@section('title', 'Home')

@section('content')
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Welcome to Voxura
            </h1>
            <p class="text-xl md:text-2xl mb-8">
                Discover innovative products and unleash your creativity with AI-powered 3D modeling
            </p>
            <a href="{{ route('products.index') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                Shop Now
            </a>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts ?? [] as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">AI-Powered 3D Modeling</h2>
            <p class="text-lg text-gray-600 mb-8">
                Create stunning 3D models with our advanced AI technology
            </p>
            <a href="{{ route('ai.modeling') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition-colors">
                Start Modeling
            </a>
        </div>
    </div>
@endsection