<?php

namespace Datalogix\TailwindComponents\Components\Form;

use Datalogix\TailwindComponents\Component;
use Datalogix\TailwindComponents\Traits\HandlesBoundValues;
use Datalogix\TailwindComponents\Traits\HandlesLabelText;
use Datalogix\TailwindComponents\Traits\HandlesValidationErrors;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Select extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;
    use HandlesLabelText;

    /**
     * The selected key.
     *
     * @var mixed
     */
    public $selectedKey;

    /**
     * The select name.
     *
     * @var string
     */
    public $name;

    /**
     * The select options.
     *
     * @var mixed
     */
    public $options = [];

    /**
     * Item text on options.
     *
     * @var string|array|int|null
     */
    public $itemText = null;

    /**
     * Item value on options.
     *
     * @var string|array|int|null
     */
    public $itemValue = null;

    /**
     * The select is multiple.
     *
     * @var bool
     */
    public $multiple = false;

    /**
     * Display empty option.
     *
     * @var bool
     */
    public $emptyOption = true;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  string|array|int|null  $itemText
     * @param  string|array|int|null  $itemValue
     * @param  mixed  $options
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  bool  $multiple
     * @param  bool  $showErrors
     * @param  bool  $emptyOption
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $itemText = null,
        $itemValue = null,
        $options = [],
        $bind = null,
        $default = null,
        $multiple = false,
        $showErrors = true,
        $emptyOption = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->itemText = $itemText ?: 'name';
        $this->itemValue = $itemValue ?: 'id';
        $this->options = $this->prepareOptions($options);

        if ($this->isNotWired()) {
            $key = Str::before($name, '[]');
            $default = $this->getBoundValue($bind, $key) ?: $default;

            $this->selectedKey = old($key, $default);
        }

        $this->multiple = $multiple;
        $this->showErrors = $showErrors;
        $this->emptyOption = $emptyOption;
    }

    /**
     * Check if the option is selected.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function isSelected($key)
    {
        if ($this->isWired()) {
            return false;
        }

        $value = $this->selectedKey;

        if ($value instanceof Collection) {
            $value = $value->pluck($this->itemValue)->toArray();
        }

        return in_array($key, Arr::wrap($value));
    }

    /**
     * Prepare options.
     *
     * @param  mixed  $options
     * @return array
     */
    protected function prepareOptions($options)
    {
        return Collection::make($options)
            ->mapWithKeys(function ($value, $key) {
                $key = data_get($value, $this->itemValue, $key);
                $value = data_get($value, $this->itemText, $value);

                return [$key => $value];
            })
            ->toArray();
    }
}
