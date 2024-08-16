<label for="{{ $id }}" class="flex flex-col">
    <span>
        @if ($slot->isEmpty())
            {{ $label }}
        @else
            {{ $slot }}
        @endif

        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
    </span>

    @switch($type)
        @case('textarea')
            <textarea name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>{{ $value }}</textarea>
            @break
        @case('select')
            <select id="{{ $id }}" name="{{ $name }}" {{ $attributes }}>
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
            <input name="{{ $name }}" type="{{ $type }}" id="{{ $id }}" value="{{ $value }}" {{ $attributes }}/>
    @endswitch
</label>
