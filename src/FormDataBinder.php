<?php

namespace Datalogix\TailwindComponents;

use Illuminate\Support\Arr;

class FormDataBinder
{
    /**
     * Tree of bound targets.
     *
     * @var array
     */
    private $bindings = [];

    /**
     * Wired to a Livewire component.
     *
     * @var bool
     */
    private $wire = false;

    /**
     * Bind a target to the current instance.
     *
     * @param  mixed  $target
     * @return void
     */
    public function bind($target)
    {
        $this->bindings[] = $target;
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    public function get()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding target.
     *
     * @return void
     */
    public function pop()
    {
        array_pop($this->bindings);
    }

    /**
     * Returns wether the form is bound to a Livewire model.
     *
     * @return bool
     */
    public function isWired()
    {
        return $this->wire;
    }

    /**
     * Enable Livewire binding.
     *
     * @return void
     */
    public function wire()
    {
        $this->wire = true;
    }

    /**
     * Disable Livewire binding.
     *
     * @return void
     */
    public function endWire()
    {
        $this->wire = false;
    }
}
