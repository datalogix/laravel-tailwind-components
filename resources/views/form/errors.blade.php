@error($name, $bag)
    <p {!! $attributes->merge($themeProvider->container->toArray()) !!}>
        {{ $message }}
    </p>
@enderror
