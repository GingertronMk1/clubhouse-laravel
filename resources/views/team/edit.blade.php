<x-app-layout>
    <form action="{{ route('team.update', ['team' => $team]) }}" method="post">
        @csrf
        @method('PUT')
        <x-input name="name" :value="$team->name" />
        <x-input name="description" type="textarea" :value="$team->description" />
        @foreach($team->colours as $colour)
            <x-input name="colours[]" type="color" :value="$colour" />
        @endforeach
        <button type="submit">Update</button>
    </form>

</x-app-layout>
