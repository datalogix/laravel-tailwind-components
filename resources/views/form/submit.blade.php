<div {!! $themeProvider->container !!}>
    <button {!! $attributes->merge($themeProvider->button->toArray()) !!} type="{{ $type }}">
        {!! trim($slot) ?: __('Submit') !!}
    </button>
</div>
