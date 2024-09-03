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
        <x-input name="sport_id"
                 type="select"
                 :options="\App\Models\Sport::get()"
                 :value="$position->sport_id" />
        <button class="btn btn-primary"
                type="submit">Update</button>
    </form>

    @push('scripts')
        <script>
            const positionIcon = document.querySelector('i[data-position-id=\'{{ $position->id }}\']');
            positionIcon.classList.remove('fa-solid');
            positionIcon.classList.add('fa-regular')
            document.querySelector('input[type=\'range\'][name=\'preview_x\']').addEventListener(
                'input',
                function(e) {
                    if (!e?.target?.value) {
                        return;
                    }

                    if (!positionIcon) {
                        return;
                    }

                    positionIcon.style.left = `${e.target.value}%`;
                }
            )
            document.querySelector('input[type=\'range\'][name=\'preview_y\']').addEventListener(
                'input',
                function(e) {
                    if (!e?.target?.value) {
                        return;
                    }

                    if (!positionIcon) {
                        return;
                    }

                    positionIcon.style.bottom = `${e.target.value}%`;
                }
            )
        </script>
    @endpush

</x-app-layout>
