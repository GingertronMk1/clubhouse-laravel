<x-app-layout>
    <form action="{{ route('competition.store') }}" method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description" type="textarea" />
        <x-input name="sport_id" type="select" :options="\App\Models\Sport::all()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
