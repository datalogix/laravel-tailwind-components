<div {!! $themeProvider->container !!}>
    <label {!! $themeProvider->label !!}>
        <input {!! $attributes->merge($themeProvider->radio->toArray()) !!}
            type="radio"
            value="{{ $value }}"

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            @if($checked)
                checked="checked"
            @endif
        />

        <span {!! $themeProvider->label_text !!} >{{ $label }}</span>
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" />
    @endif
</div>
