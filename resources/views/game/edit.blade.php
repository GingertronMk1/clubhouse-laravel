<x-app-layout>
    <form id="edit-game-form"
          action="{{ route('game.update', ['game' => $game]) }}"
          method="post">
        @csrf
        @method('PUT')
        <x-input name="name"
                 :value="$game->name" />
        <x-input name="start"
                 type="datetime-local"
                 :value="$game->start" />
        <x-input name="description"
                 type="textarea"
                 :value="$game->description" />
        <x-input name="summary"
                 type="textarea"
                 :value="$game->summary" />
        <x-input name="competition_id"
                 type="select"
                 :value="$game->competition_id"
                 :options="\App\Models\Competition::get()" />
        <x-input name="team_1_id"
                 type="select"
                 :value="$game->team_1_id"
                 :options="\App\Models\Team::get()" />
        <x-input name="team_2_id"
                 type="select"
                 :value="$game->team_2_id"
                 :options="\App\Models\Team::get()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
