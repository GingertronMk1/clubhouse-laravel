<div class="position-display">
    @foreach($sport->positions as $position)
        <i
            class="fa-solid fa-user"
            style="
                left: {{ $position->preview_x }}%;
                bottom: {{ $position->preview_y }}%;
            "
            title="{{ $position->name }}"
        ></i>
    @endforeach
</div>
