<div class="{{ $type === 'checkbox' ? 'form-check' : 'd-flex flex-column' }} mb-3">
    <label class="{{ $type === 'checkbox' ? 'form-check-label' : 'form-label' }}"
           for="{{ $id }}">
        @if ($slot->isEmpty())
            {{ $label }}
        @else
            {{ $slot }}
        @endif

        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
        @if ($type === 'range')
            <small data-range-id="{{ $id }}">{{ $value }}</small>
        @endif
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

<script>
    document
        ?.querySelector('input[id=\'{{ $id }}\']')
        ?.addEventListener(
            "input",
            function(e) {
                if (e?.target?.value ?? false) {
                    const rangeValueElement = document?.querySelector('[data-range-id=\'{{ $id }}\']');
                    if (rangeValueElement) {
                        rangeValueElement.textContent = e.target.value;
                    }
                }
            }
        )
</script>
