<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white dark:text-gray-200 leading-tight">
            {{ __('Listado de películas que te han gustado') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mx-8">
        @foreach ($films as $film)
            <div class="my-8 bg-black rounded-lg overflow-hidden">
                <a href="{{ route('films.show', $film) }}" class="block text-white text-xl hover:underline overflow-hidden">
                    <div class="truncate">{{ $film->title }}</div>
                    <img src="{{ $film->photo }}" alt="{{ $film->title }}" class="w-full h-48 object-cover my-2">
                    <div class="text-gray-300 text-sm">Precio: {{ $film->ticket_price }}</div>
                </a>
                <div class="p-4">
                    <livewire:like :film="$film" class="mt-4" />
                    <ul class="mt-2">
                        @foreach ($film->generos as $genero)
                            <li class="inline-block bg-gray-500 text-white px-2 py-1 rounded-full text-sm mr-2">{{ $genero->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
