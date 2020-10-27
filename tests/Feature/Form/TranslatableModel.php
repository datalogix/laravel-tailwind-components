<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TranslatableModel extends Model
{
    use HasTranslations;

    public $translatable = ['input', 'output'];
}
