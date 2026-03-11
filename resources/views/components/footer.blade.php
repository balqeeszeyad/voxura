<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Voxura</h3>
                <p class="text-gray-300">
                    Your premier destination for innovative products and AI-powered 3D modeling.
                </p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white">Products</a></li>
                    <li><a href="{{ route('ai.modeling') }}" class="text-gray-300 hover:text-white">AI Modeling</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-gray-300 hover:text-white">Cart</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <p class="text-gray-300">
                    Email: info@voxura.com<br>
                    Phone: (555) 123-4567
                </p>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center">
            <p class="text-gray-300">
                &copy; {{ date('Y') }} Voxura. All rights reserved.
            </p>
        </div>
    </div>
</footer>