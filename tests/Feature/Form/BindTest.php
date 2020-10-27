<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;
use Illuminate\Http\Request;

class BindTest extends TestCase
{
    public function testCanBindATargetToTheForm()
    {
        $this->registerTestRoute('form.bind-target');

        $this->visit('/form.bind-target')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('option[value="2"]:selected')
            ->seeElement('select[multiple]')
            ->seeElement('option[value="d"]:selected')
            ->seeElement('option[value="e"]:selected')
            ->seeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    public function testOverridesTheBoundTargetWithTheOldRequestData()
    {
        $this->registerTestRoute('form.bound-with-validation-errors', function (Request $request) {
            $request->validate([
                'input'    => 'required',
                'textarea' => 'required',
                'select'   => 'required',
                'checkbox' => 'required',
                'radio'    => 'required',
            ]);
        });

        $this->visit('/form.bound-with-validation-errors')
            ->type('d', 'input')
            ->type('e', 'textarea')
            ->select('f', 'select')
            ->uncheck('checkbox')
            ->check('radio')
            ->press('Submit')
            ->seeElement('input[name="input"][value="d"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    public function testItOverridesTheDefaultValue()
    {
        $this->registerTestRoute('form.default-values-with-bound-target');

        $this->visit('/form.default-values-with-bound-target')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]')
            ->dontSeeElement('input[name="radio"]:checked');
    }

    public function testCanBindTwoTargetsToTheForm()
    {
        $this->registerTestRoute('form.bind-two-targets');

        $this->visit('/form.bind-two-targets')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->dontSeeElement('option[value="c"]:selected')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    public function testCanOverrideTheGlobalBindWithABindPerElement()
    {
        $this->registerTestRoute('form.override-bind');

        $this->visit('/form.override-bind')
            ->seeElement('input[name="input"][value="d"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]')
            ->dontSeeElement('input[name="radio"]:checked');
    }

    public function testCanDisableAGlobalBindPerElement()
    {
        $this->registerTestRoute('form.undo-bind');

        $this->visit('/form.undo-bind')
            ->seeElement('input[name="input"][value="a"]')
            ->dontSeeInElement('textarea[name="textarea"]', 'b');
    }
}
