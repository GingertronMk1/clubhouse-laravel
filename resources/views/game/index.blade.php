<x-app-layout>
    @foreach ($games as $game)
        <div class="card mt-3">
            <div class="card-header d-flex flex-row">
                {{ $game->name }}: {{ $game->team1->name }} vs {{ $game->team2->name }}
                @ <span x-data="{ date: '{{ $game->start }}' }"
                      x-text="(new Date(date)).toLocaleString()"></span>
                <span class="ms-auto">{{ $game->competition->name }}</span>
            </div>
            <div class="card-body">{{ $game->description }}</div>
            <div class="card-body">{{ $game->summary }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('game.edit', ['game' => $game]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
