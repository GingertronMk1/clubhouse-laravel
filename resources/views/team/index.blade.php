<x-app-layout>
    @foreach($teams as $team)
        <div class="card mt-3 {{ $loop->last ? 'mb-3' : '' }}">
            <div class="card-header d-flex flex-row justify-content-between">
                <span>{{ $team->name }}</span>
                <span>
                    @foreach($team->colours as $colour)
                        <i class="fa-solid fa-square" style="color: {{ $colour }};"></i>
                    @endforeach
                </span>
            </div>
            <div class="card-body">{{ $team->description }}</div>
            <div class="card-footer">
                <a
                    href="{{ route('team.edit', ['team'=> $team]) }}"
                    class="btn btn-primary"
                >
                    Edit
                </a>
            </div>
        </div>
    @endforeach
</x-app-layout>
