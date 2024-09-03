<x-app-layout>
    @foreach ($competitions as $competition)
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between flex-row">
                <span>
                    {{ $competition->name }}
                </span>
                <span>
                    {{ $competition->sport->name }}
                    |
                    {{ $competition->parent?->name ?? 'No Parent' }}
                    |
                    @php
                        $childCount = count($competition->children);
                        $gameCount = count($competition->games);
                    @endphp
                    {{ $childCount === 1 ? '1 child' : "{$childCount} children" }}
                    |
                    {{ $gameCount === 1 ? '1 game' : "{$gameCount} games" }}
                </span>
            </div>
            <div class="card-body">{{ $competition->description }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('competition.edit', ['competition' => $competition]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
