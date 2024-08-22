<x-app-layout>
    @slot('header')
        <h2 class="m-0">Teams</h2>
        <a class="btn btn-primary"
           href="{{ route('team.create') }}">
            Add
            <i class="fa-solid fa-plus"></i>
        </a>
    @endslot

    @foreach ($teams as $team)
        <div class="card {{ $loop->last ? 'mb-3' : '' }} mt-3">
            <div class="card-header d-flex justify-content-between flex-row">
                <span>{{ $team->name }}</span>
                <span>
                    @foreach ($team->colours as $colour)
                        <i class="fa-solid fa-square"
                           style="color: {{ $colour }};"></i>
                    @endforeach
                </span>
            </div>
            <div class="card-body">{{ $team->description }}</div>
            <div class="card-footer">
                <a class="btn btn-primary"
                   href="{{ route('team.edit', ['team' => $team]) }}">
                    Edit
                </a>
            </div>
        </div>
    @endforeach
</x-app-layout>
