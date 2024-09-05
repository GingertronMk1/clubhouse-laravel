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
        <div class="row">
            <div class="col-6 d-flex flex-column justify-content-evenly">
                <x-input name="preview_x"
                         type="range"
                         value="50"
                         min="0"
                         max="100" />
                <x-input name="preview_y"
                         type="range"
                         value="50"
                         min="0"
                         max="100" />
            </div>
            <div class="col-6">
                <x-position-display :$sport />
            </div>
        </div>
        <button class="btn btn-primary"
                type="submit">Create</button>
    </form>
</x-app-layout>
