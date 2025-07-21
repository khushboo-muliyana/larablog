<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Create New Post</h1>
            
            <!-- Add error display -->
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
                                 :value="old('title')" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                
                <div class="mb-4">
                    <x-input-label for="body" :value="__('Content')" />
                    <textarea id="body" name="body" rows="6" required
                              class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('body') }}</textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                
                <div class="flex items-center justify-end">
                    <x-primary-button>
                        {{ __('Publish Post') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>