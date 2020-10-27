<?php

namespace Datalogix\TailwindComponents;

use Illuminate\Support\Collection;

class ThemeProvider
{
    /**
     * The themes.
     *
     * @var array
     */
    protected $themes;

    /**
     * The items of theme on component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $items;

    /**
     * Create a new theme provider instance.
     *
     * @param  array  $themes
     * @return void
     */
    public function __construct(array $themes)
    {
        $this->themes = $themes;
    }

    /**
     * Create a new theme provider instance.
     *
     * @param  string|null  $themeName
     * @param  string  $componentKey
     * @return \Datalogix\TailwindComponents\ThemeProvider
     */
    public function make($themeName, $componentKey)
    {
        $themeName = $themeName ?: app(ThemeBinder::class)->get();
        $theme = $this->themes[$themeName] ?? $this->themes['default'];

        $this->items = Collection::make($theme[$componentKey] ?? []);

        return $this;
    }

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @return \Datalogix\TailwindComponents\ComponentAttributeBag
     */
    public function __get($key)
    {
        return new ComponentAttributeBag($this->items->get($key, []));
    }
}
