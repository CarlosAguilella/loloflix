<x-app-layout>
    {{ $film->title }}

    <video src="{{ $film->video }}" controls width="100%" height="100%"></video>
</x-app-layout>
