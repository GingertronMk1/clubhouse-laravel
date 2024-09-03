<x-app-layout>
    @foreach ($sports as $sport)
        <div class="card mt-3">
            <div class="card-header">{{ $sport->name }}</div>
            <div class="card-body">{{ $sport->description }}</div>
            <div class="card-footer">
                <a class="btn btn-outline-primary"
                   href="{{ route('sport.position.index', ['sport' => $sport]) }}">Positions</a>
                <a class="btn btn-primary"
                   href="{{ route('sport.show', ['sport' => $sport]) }}">View</a>
                <a class="btn btn-secondary"
                   href="{{ route('sport.edit', ['sport' => $sport]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
