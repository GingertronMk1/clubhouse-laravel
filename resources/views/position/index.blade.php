<x-app-layout>
    @foreach ($positions as $position)
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between flex-row">
                <span>{{ $position->name }}</span>
                <span>{{ $position->sport->name }}</span>
            </div>
            <div class="card-body">{{ $position->description }}</div>
            <div class="list-group list-group-flush">
                <div class="list-group-item">X: {{ $position->preview_x }}</div>
                <div class="list-group-item">Y: {{ $position->preview_y }}</div>
                <div class="list-group-item">Sort Order: {{ $position->sort_order }}</div>
                <div class="list-group-item">Default Number: {{ $position->default_number }}</div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('position.edit', ['position' => $position]) }}">Edit</a>
            </div>
        </div>
    @endforeach
</x-app-layout>
