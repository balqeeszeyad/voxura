<div class="flex items-center space-x-4 py-4 border-b border-gray-200">
    <img src="{{ $item->product->image ?? 'https://via.placeholder.com/100x100?text=Product' }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
    <div class="flex-1">
        <h4 class="text-lg font-medium text-gray-900">
            <a href="{{ route('products.show', $item->product) }}" class="hover:text-indigo-600">
                {{ $item->product->name }}
            </a>
        </h4>
        <p class="text-gray-600">${{ number_format($item->product->price, 2) }}</p>
    </div>
    <div class="flex items-center space-x-2">
        <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center">
            @csrf
            @method('PATCH')
            <button type="submit" name="action" value="decrease" class="bg-gray-200 text-gray-700 px-2 py-1 rounded-l hover:bg-gray-300">-</button>
            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border-t border-b border-gray-300" readonly>
            <button type="submit" name="action" value="increase" class="bg-gray-200 text-gray-700 px-2 py-1 rounded-r hover:bg-gray-300">+</button>
        </form>
        <form method="POST" action="{{ route('cart.remove', $item) }}" class="ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </form>
    </div>
    <div class="text-right">
        <p class="text-lg font-semibold text-gray-900">
            ${{ number_format($item->product->price * $item->quantity, 2) }}
        </p>
    </div>
</div>