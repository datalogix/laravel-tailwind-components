<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;

class ThemeTest extends TestCase
{
    public function testBindTheme()
    {
        $this->registerTestRoute('form.bind-theme');

        $this->visit('/form.bind-theme')
            ->dontSee('input[name=input].form-input')
            ->dontSee('input[name=checkbox].form-checkbox')
            ->dontSee('input[name=radio].form-radio')
            ->dontSee('textarea[name=textarea].form-textarea')
            ->dontSee('select[name=select].form-select')
            ->dontSee('select[name=multiselect].form-multiselect');
    }

    public function testBindMultipleThemes()
    {
        $this->registerTestRoute('form.bind-multiple-themes');

        $this->visit('/form.bind-multiple-themes')
            ->seeElement('input[name=input].form-input')
            ->dontSee('input[name=checkbox].form-checkbox')
            ->seeElement('input[name=radio].form-radio')
            ->dontSee('textarea[name=textarea].form-textarea')
            ->dontSee('select[name=select].form-select')
            ->dontSee('select[name=multiselect].form-multiselect');
    }

    public function testDefaultTheme()
    {
        $this->registerTestRoute('form.default-theme');

        $this->visit('/form.default-theme')
            ->seeElement('input[name=input].form-input')
            ->seeElement('input[name=checkbox].form-checkbox')
            ->seeElement('input[name=radio].form-radio')
            ->seeElement('textarea[name=textarea].form-textarea')
            ->seeElement('select[name=select].form-select')
            ->seeElement('select[name=multiselect].form-multiselect');
    }
}
