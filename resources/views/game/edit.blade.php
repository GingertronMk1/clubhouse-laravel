<x-app-layout>
    <form action="{{ route('game.update', ['game' => $game]) }}" method="post">
        @csrf
        @method('PUT')
        <x-input name="name" />
        <x-input name="start" type="datetime-local" />
        <x-input name="description" type="textarea" />
        <x-input name="summary" type="textarea" />
        <x-input name="default_order" type="number" />
        <x-input name="competition_id" type="select" :options="\App\Models\Competition::all()" />
        <x-input name="team_1_id" type="select" :options="\App\Models\Team::all()" />
        <x-input name="team_2_id" type="select" :options="\App\Models\Team::all()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
