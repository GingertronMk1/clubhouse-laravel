<x-app-layout>
    <form action="{{ route('competition.update', ['competition' => $competition]) }}" method="post">
        @csrf
        @method('PUT')
        <x-input name="name" :value="$competition->name" />
        <x-input name="description" type="textarea" :value="$competition->description" />
        <x-input name="sport_id" type="select" :options="\App\Models\Sport::get()" :value="$competition->sport_id"/>
        <button type="submit">Update</button>
    </form>

</x-app-layout>
