<x-app-layout>
    <form action="{{ route('position.store') }}" method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description" type="textarea" />
        <x-input name="sort_order" type="number" />
        <x-input name="default_order" type="number" />
        <x-input name="preview_x" type="range" value="0" min="0" max="100" />
        <x-input name="preview_y" type="range" value="0" min="0" max="100" />
        <x-input name="sport_id" type="select" :options="\App\Models\Sport::get()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
