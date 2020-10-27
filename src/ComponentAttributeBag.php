<?php

namespace Datalogix\TailwindComponents;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\View\ComponentAttributeBag as BaseComponentAttributeBag;

class ComponentAttributeBag extends BaseComponentAttributeBag implements Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }
}
