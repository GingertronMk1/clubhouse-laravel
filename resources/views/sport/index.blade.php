<x-app-layout>
    @foreach ($sports as $sport)
        <div class="card mt-3">
            <div class="card-header">{{ $sport->name }}</div>
            <div class="card-body">{{ $sport->description }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('sport.edit', ['sport' => $sport]) }}">Edit</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
