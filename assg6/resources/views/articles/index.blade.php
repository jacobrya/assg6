<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            @can('create', \App\Models\Article::class)
                <a href="{{ route('articles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Article
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @forelse ($articles as $article)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold">
                                    <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    By {{ $article->user->name }} | {{ $article->created_at->format('M d, Y') }}
                                </p>
                                <p class="mt-2">{{ Str::limit($article->body, 150) }}</p>
                            </div>
                            <div class="flex space-x-2">
                                @can('update', $article)
                                    <a href="{{ route('articles.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">
                                        Edit
                                    </a>
                                @endcan
                                @can('delete', $article)
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        No articles found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
