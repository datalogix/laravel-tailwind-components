<div {!! $themeProvider->container !!}>
    <label {!! $themeProvider->label !!}>
        <x-label :label="$label" />

        <textarea {!! $attributes->merge($themeProvider->textarea->toArray()) !!}
            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif
        >@unless($isWired()){!! $value !!}@endunless</textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" />
    @endif
</div>
