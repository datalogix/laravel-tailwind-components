<?php

namespace Datalogix\TailwindComponents\Components\Form;

use Datalogix\TailwindComponents\Component;
use Datalogix\TailwindComponents\Traits\HandlesDefaultAndOldValue;
use Datalogix\TailwindComponents\Traits\HandlesLabelText;
use Datalogix\TailwindComponents\Traits\HandlesValidationErrors;
use Illuminate\Support\Str;

class Input extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;
    use HandlesLabelText;

    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input type.
     *
     * @var string|null
     */
    public $type;

    /**
     * The input value.
     *
     * @var mixed
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  string|null  $type
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $type = null,
        $bind = null,
        $default = null,
        $language = null,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->type = $type ?: $this->getType($name);
        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        if ($this->type !== 'password') {
            $this->setValue($name, $bind, $default, $language);
        }
    }

    /**
     * Get input type by name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getType($name)
    {
        $types = $this->config['types_by_name'] ?? [];

        foreach ($types as $type => $names) {
            if (Str::contains($name, $names)) {
                return $type;
            }
        }

        return $this->config['default_type'] ?? 'text';
    }
}
