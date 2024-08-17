<div class="mb-3 d-flex flex-column">
    <label class="form-label" for="{{ $id }}">
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
            <textarea name="{{ $name }}" id="{{ $id }}" class="{{ $inputClass }}" {{ $attributes }}>{{ $value }}</textarea>
            @break
        @case('select')
            <select id="{{ $id }}" name="{{ $name }}" class="{{ $inputClass }}" {{ $attributes }}>
                @if($canBeNull)
                    <option value="">---</option>
                @endif
                @foreach($options as $option)
                    <option value="{{ $valueFn($option) }}" @selected($valueFn($option) === $value)>
                        {{ $textFn($option) }}
                    </option>
                @endforeach
            </select>
            @break
        @default
            <input name="{{ $name }}" type="{{ $type }}" id="{{ $id }}" class="{{ $inputClass }}" value="{{ $value }}" {{ $attributes }}/>
    @endswitch
</div>
