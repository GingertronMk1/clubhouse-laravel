<div class="d-flex flex-column mb-3">
    <label class="form-label"
           for="{{ $id }}">
        @if ($slot->isEmpty())
            {{ $label }}
        @else
            {{ $slot }}
        @endif

        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
    </label>

    @switch($type)
        @case('textarea')
            <textarea class="{{ $inputClass }}"
                      id="{{ $id }}"
                      name="{{ $name }}"
                      {{ $attributes }}>{{ $value }}</textarea>
        @break

        @case('select')
            <select class="{{ $inputClass }}"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    {{ $attributes }}>
                @if ($canBeNull)
                    <option value="">---</option>
                @endif
                @foreach ($options as $option)
                    <option value="{{ $valueFn($option) }}"
                            @selected($valueFn($option) === $value)>
                        {{ $textFn($option) }}
                    </option>
                @endforeach
            </select>
        @break

        @default
            <input class="{{ $inputClass }}"
                   id="{{ $id }}"
                   name="{{ $name }}"
                   type="{{ $type }}"
                   value="{{ $value }}"
                   {{ $attributes }} />
    @endswitch
</div>
