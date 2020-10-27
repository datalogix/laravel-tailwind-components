<?php

namespace Datalogix\TailwindComponents;

use Illuminate\Support\Arr;

class ThemeBinder
{
    /**
     * Tree of targets.
     *
     * @var array
     */
    private $bindings = [];

    /**
     * Bind a theme to the current instance.
     *
     * @param  string  $theme
     * @return void
     */
    public function bind($theme)
    {
        $this->bindings[] = $theme;
    }

    /**
     * Get the latest bound theme.
     *
     * @return string
     */
    public function get()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding theme.
     *
     * @return void
     */
    public function pop()
    {
        array_pop($this->bindings);
    }
}
