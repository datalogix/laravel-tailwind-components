<div {!! $themeProvider->container !!}>
    <button {!! $attributes->merge($themeProvider->button->toArray()) !!} type="{{ $type }}">
        {!! $slot !!}
    </button>
</div>
