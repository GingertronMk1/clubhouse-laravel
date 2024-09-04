<x-app-layout>
    <form id="edit-position-form"
          action="{{ route('sport.position.update', ['position' => $position, 'sport' => $sport]) }}"
          method="post">
        @csrf
        @method('PUT')
        <input name="id"
               type="hidden"
               value="{{ $position->id }}"
               disabled />
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
        <div class="row">
            <div class="col-6 d-flex flex-column justify-content-evenly">
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
            </div>
            <div class="col-6">
                <x-position-display :$sport />
            </div>
        </div>
        <button class="btn btn-primary"
                type="submit">Update</button>
    </form>
</x-app-layout>
