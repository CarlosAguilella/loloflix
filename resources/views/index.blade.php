<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("These are the newest movies we have added!") }}
                </div>
                <div class="flex space-x-4 p-4">
                    @foreach ($filmsLatest as $film)
                        <div class="flex-shrink-0 border truncate border-blue-500 p-4 w-48 h-48">
                            <div class="text-lg font-bold overflow-hidden overflow-ellipsis">
                                {{ $film->title }}
                            </div>
                            <img src="{{ $film->photo }}" class="mt-2" width="100px" height="100px">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("These are the films that our audience has liked the most!") }}
                </div>
                <div class="flex space-x-4 p-4">
                    @foreach ($filmsLiked as $film)
                        <div class="flex-shrink-0 border border-blue-500 p-4 w-48 h-48">
                            <div class="text-lg font-bold truncate overflow-hidden overflow-ellipsis">
                                {{ $film->title }}
                            </div>
                            <img src="{{ $film->photo }}" class="mt-2" width="100px" height="100px">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
