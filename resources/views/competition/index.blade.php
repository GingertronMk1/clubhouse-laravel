<x-app-layout>
    @foreach ($competitions as $competition)
        <div class="card mt-3">
            <div class="card-header d-flex flex-row justify-content-between">
                <span>{{ $competition->name }}</span>
                <span>{{ $competition->sport->name }}</span>
            </div>
            <div class="card-body">{{ $competition->description }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('competition.edit', ['competition' => $competition]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
