<x-app-layout>
    @foreach($competitions as $competition)
        <div class="card mt-3">
            <div class="card-header">{{ $competition->name }}</div>
            <div class="card-body">{{ $competition->description }}</div>
            <div class="card-footer">
                <a href="{{ route('competition.edit', ['competition' => $competition]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
