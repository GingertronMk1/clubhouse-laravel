<div class="position-display"
     id="position-display"
     data-sport-id="{{ $sport->id }}">
    @foreach ($sport->positions as $position)
        <i class="fa-solid fa-user"
           data-position-id="{{ $position->id }}"
           title="{{ $position->name }}"
           style="
                left: {{ $position->preview_x }}%;
                bottom: {{ $position->preview_y }}%;
            "></i>
    @endforeach
</div>
