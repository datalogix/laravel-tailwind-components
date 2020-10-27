<?php

namespace Datalogix\TailwindComponents\Components;

use Datalogix\TailwindComponents\Component;
use Datalogix\TailwindComponents\Traits\HandlesBoundValues;

class Form extends Component
{
    use HandlesBoundValues;

    /**
     * The form method.
     *
     * @var string
     */
    public $method;

    /**
     * The form action.
     *
     * @var string|null
     */
    public $action;

    /**
     * The form enctype.
     *
     * @var string|null
     */
    public $enctype;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing.
     *
     * @var bool
     */
    public $spoofMethod = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|null  $enctype
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $method = 'POST',
        $action = null,
        $route = null,
        $bind = null,
        $enctype = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
        $this->action = $action;
        $this->enctype = $enctype;

        if (is_null($this->action) && ! is_null($route)) {
            $this->action = route($route, $bind ?: $this->getBoundTarget());
        }
    }
}
