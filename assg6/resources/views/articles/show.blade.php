<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm text-gray-500 mb-4">
                        By {{ $article->user->name }} | {{ $article->created_at->format('M d, Y') }}
                    </p>
                    <div class="prose max-w-none">
                        {{ $article->body }}
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        @can('update', $article)
                            <a href="{{ route('articles.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $article)
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        @endcan
                        <a href="{{ route('articles.index') }}" class="text-gray-600 hover:text-gray-800">Back to Articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
