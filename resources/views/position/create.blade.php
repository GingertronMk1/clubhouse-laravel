<x-app-layout>
    <form id="create-position-form"
          action="{{ route('sport.position.store', ['sport' => $sport]) }}"
          method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description"
                 type="textarea" />
        <x-input name="sort_order"
                 type="number" />
        <x-input name="default_number"
                 type="number" />
        <x-input name="preview_x"
                 type="range"
                 value="0"
                 min="0"
                 max="100" />
        <x-input name="preview_y"
                 type="range"
                 value="0"
                 min="0"
                 max="100" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
