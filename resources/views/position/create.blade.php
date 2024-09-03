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

    @push('scripts')
        <script>
            const newPositionIcon = document.createElement('i', {});
            newPositionIcon.classList.add('fa-regular', 'fa-user');
            newPositionIcon.setAttribute('title', 'New Position');
            newPositionIcon.style.left = '50%';
            newPositionIcon.style.bottom = '50%';
            newPositionIcon.id = 'NEW POSITION';
            const positionDisplay = document.querySelector('[data-sport-id=\'{{ $sport->id }}\']');
            positionDisplay.appendChild(newPositionIcon);

            document.querySelector('input[type=\'range\'][name=\'preview_x\']').addEventListener(
                'input',
                function(e) {
                    if (!e?.target?.value) {
                        return;
                    }
                    newPositionIcon.style.left = `${e.target.value}%`;
                }
            )
            document.querySelector('input[type=\'range\'][name=\'preview_y\']').addEventListener(
                'input',
                function(e) {
                    if (!e?.target?.value) {
                        return;
                    }

                    newPositionIcon.style.bottom = `${e.target.value}%`;
                }
            )
        </script>
    @endpush

</x-app-layout>
