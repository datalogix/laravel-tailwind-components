<?php

namespace Datalogix\TailwindComponents\Traits;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    /**
     * Show errors.
     *
     * @var bool
     */
    public $showErrors = true;

    /**
     * Returns a boolean wether the given attribute has an error and the should be shown.
     *
     * @param  string  $name
     * @param  string  $bag
     * @return bool
     */
    public function hasErrorAndShow($name, $bag = 'default')
    {
        return $this->showErrors
            ? $this->hasError($name, $bag)
            : false;
    }

    /**
     * Getter for the ErrorBag.
     *
     * @param  string  $bag
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    protected function getErrorBag($bag = 'default')
    {
        $bags = View::shared('errors', function () {
            return request()->session()->get('errors', new ViewErrorBag);
        });

        return $bags->getBag($bag);
    }

    /**
     * Returns a boolean wether the given attribute has an error.
     *
     * @param  string  $name
     * @param  string  $bag
     * @return bool
     */
    public function hasError($name, $bag = 'default')
    {
        $name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));

        $errorBag = $this->getErrorBag($bag);

        return $errorBag->has($name) || $errorBag->has($name.'.*');
    }
}
