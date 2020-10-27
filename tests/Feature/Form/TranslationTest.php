<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;
use Illuminate\Http\Request;

class TranslationTest extends TestCase
{
    public function testCanHaveNoTargetBoundToTheForm()
    {
        $this->registerTestRoute('form.translation');

        $this->visit('/form.translation')
            ->seeElement('input[name="input[nl]"][value=""]')
            ->seeElement('input[name="input[en]"][value=""]');
    }

    public function testCanBindATargetToTheForm()
    {
        $this->registerTestRoute('form.translation-with-bind');

        $this->visit('/form.translation-with-bind')
            ->seeElement('input[name="input[nl]"][value="hallo"]')
            ->seeElement('input[name="input[en]"][value="hello"]');
    }

    public function testCanOverrideTheBindWithADifferentTarget()
    {
        $this->registerTestRoute('form.translation-with-bind');

        $this->visit('/form.translation-with-bind')
            ->seeElement('input[name="output[nl]"][value="vaarwel"]')
            ->seeElement('input[name="output[en]"][value="goodbye"]');
    }

    public function testShowsTheValidationErrorsAndOldValuesCorrectly()
    {
        $this->registerTestRoute('form.translation-with-bind', function (Request $request) {
            $request->validate([
                'input.*' => 'min:5',
            ]);
        });

        $this->visit('/form.translation-with-bind')
            ->type('hoi', 'input[nl]')
            ->type('hey', 'input[en]')
            ->press('Submit')
            ->seeElement('input[name="input[nl]"][value="hoi"]')
            ->seeElement('input[name="input[en]"][value="hey"]')
            ->seeText('The input.nl must be at least 5 characters')
            ->seeText('The input.en must be at least 5 characters');
    }
}
