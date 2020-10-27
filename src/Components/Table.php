<?php

namespace Datalogix\TailwindComponents\Components;

use Datalogix\TailwindComponents\Component;
use Illuminate\Support\Collection;

class Table extends Component
{
    /**
     * The table cols.
     *
     * @var \Illuminate\Support\Collection
     */
    public $cols;

    /**
     * The table rows.
     *
     * @var \Illuminate\Support\Collection
     */
    public $rows;

    /**
     * The table footer.
     *
     * @var \Illuminate\Support\Collection
     */
    public $footer;

    /**
     * The empty text.
     *
     * @var string|null
     */
    public $emptyText;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $cols = null,
        $rows = null,
        $footer = null,
        $emptyText = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->cols = Collection::make($cols);
        $this->rows = Collection::make($rows);
        $this->footer = Collection::make($footer);
        $this->emptyText = __($emptyText);
    }
}
