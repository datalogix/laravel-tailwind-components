<?php

namespace Datalogix\TailwindComponents\Tests\Feature;

use Datalogix\TailwindComponents\Tests\TestCase;

class FormTest extends TestCase
{
    public function testActionFromRoute()
    {
        $this->registerTestRoute('form.route');

        $this->visit('/form.route')
            ->seeElement('form[action="http://localhost/form.route"]');
    }

    public function testDetectEnctype()
    {
        $this->registerTestRoute('form.enctype');

        $this->visit('/form.enctype')
            ->seeElement('form[enctype="multipart/form-data"]')
            ->seeElement('input[name="file"][type="file"]');
    }

    public function testSpoofsTheMethodsForPutPatchAndDeleteForms()
    {
        $this->registerTestRoute('form.spoof-method')
            ->visit('/form.spoof-method')

            // methods
            ->seeElement('form[id="form_get"][method="GET"]')
            ->seeElement('form[id="form_post"][method="POST"]')
            ->seeElement('form[id="form_put"][method="POST"]')
            ->seeElement('form[id="form_patch"][method="POST"]')
            ->seeElement('form[id="form_delete"][method="POST"]')

            // spoofing
            ->dontSeeElement('form[id="form_get"] input[name="_method"]')
            ->dontSeeElement('form[id="form_post"] input[name="_method"]')
            ->seeElement('form[id="form_put"] input[name="_method"][value="PUT"]')
            ->seeElement('form[id="form_patch"] input[name="_method"][value="PATCH"]')
            ->seeElement('form[id="form_delete"] input[name="_method"][value="DELETE"]')

            // csrf
            ->dontSeeElement('form[id="form_get"] input[name="_token"]')
            ->seeElement('form[id="form_post"] input[name="_token"]')
            ->seeElement('form[id="form_put"] input[name="_token"]')
            ->seeElement('form[id="form_patch"] input[name="_token"]')
            ->seeElement('form[id="form_delete"] input[name="_token"]');
    }
}
