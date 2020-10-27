@if($label)
    <span {!! $attributes->merge($themeProvider->container->toArray()) !!}>
        {{ $label }}
    </span>
@endif
