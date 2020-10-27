<?php

namespace Datalogix\TailwindComponents\Components;

use Datalogix\TailwindComponents\Component;

class Button extends Component
{
    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  string  $type
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($type = 'button', $theme = null)
    {
        parent::__construct($theme);

        $this->type = $type;
    }
}
