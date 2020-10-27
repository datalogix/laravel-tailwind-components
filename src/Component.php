<?php

namespace Datalogix\TailwindComponents;

use Datalogix\TailwindComponents\Traits\HandlesLivewireFormDataBinder;
use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    use HandlesLivewireFormDataBinder;

    /**
     * The component key.
     *
     * @var string
     */
    private $componentKey;

    /**
     * The configuration of component.
     *
     * @var mixed|\Illuminate\Config\Repository
     */
    protected $config;

    /**
     * The theme provider.
     *
     * @var \Datalogix\TailwindComponents\ThemeProvider
     */
    public $themeProvider;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($theme = null)
    {
        $this->config = config('tailwind-components.components')[$this->getComponentKey()];
        $this->themeProvider = app(ThemeProvider::class)->make($theme, $this->getComponentKey());
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return $this->config['view'] ?? `tailwind-components::{$this->getComponentKey()}`;
    }

    /**
     * Return component key by class name.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        if (empty($this->componentKey)) {
            $this->componentKey = (string) Str::of(get_class($this))
                ->replace([__NAMESPACE__.'\\Components\\', '\\'], ['', '.'])
                ->lower();
        }

        return $this->componentKey;
    }
}
