<x-app-layout>
    <x-slot name="header">
        {{ $sport->name }}
    </x-slot>
    <x-position-display :$sport />
</x-app-layout>
