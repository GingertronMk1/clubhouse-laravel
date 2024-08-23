<div class="position-display">
    @foreach ($sport->positions as $position)
        <i class="fa-solid fa-user"
           title="{{ $position->name }}"
           style="
                left: {{ $position->preview_x }}%;
                bottom: {{ $position->preview_y }}%;
            "></i>
    @endforeach
</div>
