<?php

namespace Datalogix\TailwindComponents\Traits;

trait HandlesLabelText
{
    /**
     * The label text.
     *
     * @var string|bool|null
     */
    public $label;

    /**
     * Set label text.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @return void
     */
    public function setLabel($name, $label = '')
    {
        $this->label = $label === '' ? __($name) : $label;
    }
}
