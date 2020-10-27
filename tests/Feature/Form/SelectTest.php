<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;
use Illuminate\Http\Request;

class SelectTest extends TestCase
{
    public function testPostsAllSelectedOptions()
    {
        $this->registerTestRoute('form.multiple-select-keys', function (Request $request) {
            $request->validate([
                'select' => 'required|string',
            ]);
        });

        $this->visit('/form.multiple-select-keys?both=yes')
            ->seeElement('option[value="be"]:selected')
            ->seeElement('option[value="nl"]:selected')
            ->press('Submit')
            ->seeElement('option[value="be"]:selected')
            ->seeElement('option[value="nl"]:selected')
            ->seeText('The select must be a string.');
    }

    public function testShowsTheSlotIfTheOptionsAreEmpty()
    {
        $this->registerTestRoute('form.select-slot');

        $this->visit('/form.select-slot')
            ->seeElement('option[value="a"]')
            ->seeElement('option[value="b"]')
            ->seeElement('option[value="c"]');
    }

    public function testMakesTheValuesNumeric()
    {
        $this->registerTestRoute('form.select-without-keys', function (Request $request) {
            $request->validate([
                'select' => 'required|in:a,b',
            ]);
        });

        $this->visit('/form.select-without-keys')
            ->seeInElement('option[value="0"]', 'a')
            ->seeInElement('option[value="1"]', 'b')
            ->seeInElement('option[value="2"]', 'c');
    }

    public function testShowsAValidationError()
    {
        $this->registerTestRoute('form.select-without-keys', function (Request $request) {
            $request->validate([
                'select' => 'required|in:0,1',
            ]);
        });

        $this->visit('/form.select-without-keys')
            ->select('2', 'select')
            ->press('Submit')
            ->seeElement('option[value="0"]:not(:selected)')
            ->seeElement('option[value="1"]:not(:selected)')
            ->seeElement('option[value="2"]:selected');
    }
}
