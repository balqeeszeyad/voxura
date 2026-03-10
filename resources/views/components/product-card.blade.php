<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="aspect-w-1 aspect-h-1">
        <img src="{{ $product->image ?? 'https://via.placeholder.com/300x300?text=Product' }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
            <a href="{{ route('products.show', $product) }}" class="hover:text-indigo-600">
                {{ $product->name }}
            </a>
        </h3>
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ $product->description }}
        </p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-gray-900">
                ${{ number_format($product->price, 2) }}
            </span>
            <form method="POST" action="{{ route('cart.add', $product) }}" class="inline">
                @csrf
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>