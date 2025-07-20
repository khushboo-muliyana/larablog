<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Use auth()->user() instead of $user -->
                    <h3>{{ '@'.auth()->user()->username }}</h3>
                    
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/'.auth()->user()->avatar) }}" 
                             class="h-20 w-20 rounded-full mt-4">
                    @endif
                    
                    @if(auth()->user()->bio)
                        <p class="mt-4">{{ auth()->user()->bio }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>