<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;
use Illuminate\Http\Request;

class ChekboxTest extends TestCase
{
    public function testCheckTheRightElementAsDefault()
    {
        $this->registerTestRoute('form.default-checkbox');

        $this->visit('/form.default-checkbox')
            ->seeElement('input[value="a"]:checked')
            ->seeElement('input[value="b"]:not(:checked)');
    }

    public function testDoesCheckTheRightInputElementAfterAValidationError()
    {
        $this->registerTestRoute('form.checkbox-validation', function (Request $request) {
            $request->validate([
                'checkbox'   => 'required|array',
                'checkbox.*' => 'in:a',
            ]);
        });

        $this->visit('/form.checkbox-validation')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked')
            ->press('Submit')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked');
    }
}
