<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelis a las que has dado like') }}
        </h2>
    </x-slot>

    @if(count($films) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach($films as $film)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">{{ $film->title }}</h3>
                    <img src="{{ $film->photo }}" alt="{{ $film->title }}" class="mt-2 w-full h-auto object-cover">
                    <div class="m-2">
                        <livewire:like :film="$film" class="mt-4" />
                    </div>
                    <div>
                        <ul class="mt-2">
                            @foreach ($film->generos as $genero)
                                <li class="inline-block bg-gray-500 text-white px-2 py-1 rounded-full text-sm mr-2">{{ $genero->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="mt-4 p-4 bg-gray-200 dark:bg-gray-700 rounded-md">
            <p class="text-lg text-gray-600 dark:text-gray-300">No has dado like.</p>
        </div>
    @endif
</x-app-layout>
