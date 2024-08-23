<x-app-layout>
    <form action="{{ route('game.update', ['game' => $game]) }}"
          id="edit-game-form"
          method="post">
        @csrf
        @method('PUT')
        <x-input name="name" :value="$game->name" />
        <x-input name="start"
                 :value="$game->start"
                 type="datetime-local" />
        <x-input name="description"
                 :value="$game->description"
                 type="textarea" />
        <x-input name="summary"
                 :value="$game->summary"
                 type="textarea" />
        <x-input name="competition_id"
                 :value="$game->competition_id"
                 type="select"
                 :options="\App\Models\Competition::get()" />
        <x-input name="team_1_id"
                 :value="$game->team_1_id"
                 type="select"
                 :options="\App\Models\Team::get()" />
        <x-input name="team_2_id"
                 :value="$game->team_2_id"
                 type="select"
                 :options="\App\Models\Team::get()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
