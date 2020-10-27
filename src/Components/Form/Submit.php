<?php

namespace Datalogix\TailwindComponents\Components\Form;

use Datalogix\TailwindComponents\Components\Button;

class Submit extends Button
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($theme = null)
    {
        parent::__construct('submit', $theme);
    }
}
