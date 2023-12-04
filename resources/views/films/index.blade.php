<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de películas') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-8 mx-8">
        @foreach ($films as $film)
            <div class="my-8">
                <a href="{{ route('films.show', $film) }}" class="block text-sky-500 text-2xl hover:underline overflow-hidden">
                    <div class="truncate">{{ $film->title }}</div>
                    <img src="{{ $film->photo }}" alt="{{ $film->title }}" class="w-36 my-2">
                    <div class="text-gray-500 text-sm"> Price: {{ $film->ticket_price }}</div>
                </a>
                <div>
                    <livewire:like :film="$film" class="mt-4" />
                </div>
                <ul class="mt-2">
                    @foreach ($film->generos as $genero)
                        <li class="inline-block bg-gray-500 text-white px-2 py-1 rounded-full text-sm mr-2">{{ $genero->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>

{{-- npm run dev --}}
