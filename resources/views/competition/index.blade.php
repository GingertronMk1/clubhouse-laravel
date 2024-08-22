<x-app-layout>
    @foreach ($competitions as $competition)
        <div class="card mt-3">
            <div class="card-header">{{ $competition->name }}</div>
            <div class="card-body">{{ $competition->description }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('competition.edit', ['competition' => $competition]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
