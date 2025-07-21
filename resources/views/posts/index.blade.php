<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @auth
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900">Latest Posts</h1>
                <a href="{{ route('posts.create') }}" 
                   class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-200">
                    Create New Post
                </a>
            </div>
        @else
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Latest Posts</h1>
        @endauth

        @if($posts->isEmpty())
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <p class="text-gray-500">No posts available yet.</p>
                @auth
                    <a href="{{ route('posts.create') }}" class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block">
                        Be the first to create one!
                    </a>
                @endauth
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                    <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition duration-200">
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900">{{ $post->title }}</h3>
                            <p class="text-gray-600 mt-2">{{ Str::limit($post->body, 100) }}</p>
                            <div class="mt-4 flex items-center">
                                @if($post->user->avatar)
                                    <img src="{{ asset('storage/'.$post->user->avatar) }}" 
                                         class="h-8 w-8 rounded-full mr-2">
                                @endif
                                <span class="text-sm text-gray-500">
                                    By {{ $post->user->name }}
                                </span>
                                <span class="text-sm text-gray-400 mx-2">•</span>
                                <span class="text-sm text-gray-500">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <a href="{{ route('posts.show', $post) }}" 
                               class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 font-medium">
                                Read More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-app-layout>