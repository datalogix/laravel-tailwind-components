<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;

class InputTest extends TestCase
{
    public function testDetectInputTypeByName()
    {
        $this->registerTestRoute('form.input-type');

        $this->visit('/form.input-type')
            ->seeElement('input[name="input"][type="text"]')
            ->seeElement('input[name="password"][type="password"]')
            ->seeElement('input[name="file"][type="file"]')
            ->seeElement('input[name="email"][type="email"]');
    }
}
