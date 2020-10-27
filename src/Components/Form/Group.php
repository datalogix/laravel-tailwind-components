<?php

namespace Datalogix\TailwindComponents\Components\Form;

use Datalogix\TailwindComponents\Component;
use Datalogix\TailwindComponents\Traits\HandlesLabelText;
use Datalogix\TailwindComponents\Traits\HandlesValidationErrors;

class Group extends Component
{
    use HandlesValidationErrors;
    use HandlesLabelText;

    /**
     * The group name.
     *
     * @var string
     */
    public $name;

    /**
     * Show group inline.
     *
     * @var bool
     */
    public $inline = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  bool  $inline
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = '',
        $label = '',
        $inline = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->inline = $inline;
        $this->showErrors = $name && $showErrors;
    }
}
