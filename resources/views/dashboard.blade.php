<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-body">Competitions</div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-body">Sports</div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-body">Teams</div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-body">Players</div>
            </div>
        </div>
    </div>

</x-app-layout>
