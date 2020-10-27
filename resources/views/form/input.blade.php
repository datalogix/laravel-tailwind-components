<div {!! $themeProvider->{$type === 'hidden' ? 'hidden' : 'container'} !!}">
    <label {!! $themeProvider->label !!}>
        <x-label :label="$label" />

        <input {!! $attributes->merge($themeProvider->input->toArray())->merge($themeProvider->types->get($type, [])) !!}
            type="{{ $type }}"

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value }}"
            @endif
        />
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" />
    @endif
</div>
