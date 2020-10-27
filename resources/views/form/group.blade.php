<div {!! $attributes->merge($themeProvider->container->toArray()) !!}>
    <x-label :label="$label" />

    <div {!! $themeProvider->{$inline ? 'inline' : 'block'} !!}>
        {!! $slot !!}
    </div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" />
    @endif
</div>
