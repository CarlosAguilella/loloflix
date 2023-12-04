<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Index') }}
        </h2>
    </x-slot>

    <!-- Latest Films Section -->
    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">{{ __("New Releases") }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach ($filmsLatest as $film)
                            <div class="group relative overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                <img src="{{ $film->photo }}" alt="{{ $film->title }}" class="w-full h-64 object-cover transition-transform duration-300 transform group-hover:scale-105">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $film->title }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $film->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Most Liked Films Section -->
    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">{{ __("Top Picks") }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach ($filmsLiked as $film)
                            <div class="group relative overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                <img src="{{ $film->photo }}" alt="{{ $film->title }}" class="w-full h-48 object-cover transition-transform duration-300 transform group-hover:scale-105">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $film->title }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $film->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
