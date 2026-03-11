@extends('layouts.app')

@section('title', 'AI 3D Modeling')

@section('content')
    @include('components.alert')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">AI-Powered 3D Modeling</h1>
            <p class="text-xl text-gray-600">
                Create stunning 3D models using our advanced artificial intelligence technology
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Modeling Interface -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Create Your Model</h2>

                <form method="POST" action="{{ route('ai.modeling.generate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="prompt" class="block text-sm font-medium text-gray-700 mb-2">
                                Describe your model
                            </label>
                            <textarea name="prompt" id="prompt" rows="4" placeholder="A sleek modern chair with curved lines..." required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <div>
                            <label for="reference_image" class="block text-sm font-medium text-gray-700 mb-2">
                                Reference Image (Optional)
                            </label>
                            <input type="file" name="reference_image" id="reference_image" accept="image/*"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="style" class="block text-sm font-medium text-gray-700 mb-2">
                                Style
                            </label>
                            <select name="style" id="style" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="realistic">Realistic</option>
                                <option value="stylized">Stylized</option>
                                <option value="minimalist">Minimalist</option>
                                <option value="abstract">Abstract</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors font-semibold">
                            Generate Model
                        </button>
                    </div>
                </form>
            </div>

            <!-- Preview Area -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Preview</h2>
                <div id="model-preview" class="aspect-square bg-gray-100 rounded-lg flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <svg class="mx-auto h-16 w-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p>Your generated model will appear here</p>
                    </div>
                </div>

                @if(isset($generatedModel))
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Generated Model</h3>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600 mb-2">Prompt: {{ $generatedModel->prompt }}</p>
                            <div class="flex space-x-2">
                                <a href="{{ route('ai.modeling.download', $generatedModel) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Download
                                </a>
                                <form method="POST" action="{{ route('ai.modeling.save', $generatedModel) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        Save to Products
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Models -->
        @if(isset($recentModels) && $recentModels->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-8">Recent Models</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recentModels as $model)
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="aspect-square bg-gray-100 rounded mb-4 flex items-center justify-center">
                                <span class="text-gray-500">3D Model</span>
                            </div>
                            <h3 class="font-semibold mb-2">{{ Str::limit($model->prompt, 50) }}</h3>
                            <p class="text-sm text-gray-600">{{ $model->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection