<x-app-layout>
    <form id="edit-position-form"
          action="{{ route('sport.position.update', ['position' => $position, 'sport' => $sport]) }}"
          method="post">
        @csrf
        @method('PUT')
        <x-input name="name"
                 :value="$position->name" />
        <x-input name="description"
                 type="textarea"
                 :value="$position->description" />
        <x-input name="sort_order"
                 type="number"
                 :value="$position->sort_order" />
        <x-input name="default_number"
                 type="number"
                 :value="$position->default_number" />
        <x-input name="preview_x"
                 type="range"
                 value="0"
                 min="0"
                 max="100"
                 :value="$position->preview_x" />
        <x-input name="preview_y"
                 type="range"
                 value="0"
                 min="0"
                 max="100"
                 :value="$position->preview_y" />
        <x-input name="sport_id"
                 type="select"
                 :options="\App\Models\Sport::get()"
                 :value="$position->sport_id" />
        <button type="submit">Update</button>
    </form>

</x-app-layout>
