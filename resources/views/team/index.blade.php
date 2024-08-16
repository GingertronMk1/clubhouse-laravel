<x-app-layout>
    @foreach($teams as $team)
        <div class="card">
            <div class="card-header">{{ $team->name }}</div>
            <div class="card-body">{{ $team->description }}</div>
            <div class="card-footer">
                <a href="{{ route('team.edit', ['team'=> $team]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @endforeach
</x-app-layout>
