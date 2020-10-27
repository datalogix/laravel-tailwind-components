<?php

namespace Datalogix\TailwindComponents\Tests\Feature\Form;

use Datalogix\TailwindComponents\Tests\TestCase;
use Livewire\Component;
use Livewire\Livewire;

class FormComponent extends Component
{
    public $input = 'a';
    public $textarea = 'b';
    public $select = 'c';
    public $multi_select = ['d', 'e'];
    public $checkbox = true;
    public $radio = true;

    public function submit()
    {
        $this->validate([
            'input' => ['required'],
            'textarea' => ['required'],
            'select' => ['required', 'in:c'],
            'multi_select' => ['required'],
            'checkbox' => ['required', 'accepted'],
            'radio' => ['required', 'accepted'],
        ]);
    }

    public function render()
    {
        return view('form.livewire');
    }
}

class LivewireTest extends TestCase
{
    public function testCanValidateTheFields()
    {
        $component = Livewire::test(FormComponent::class);

        $component->assertSeeHtml('wire:model="input"')
            ->assertSeeHtml('wire:model="textarea"')
            ->assertSeeHtml('wire:model="select"')
            ->assertSeeHtml('wire:model="multi_select"')
            ->assertSeeHtml('wire:model="checkbox"')
            ->assertSeeHtml('wire:model="radio"');

        $component->set('input', '')
            ->set('textarea', '')
            ->set('select', '')
            ->set('multi_select', [])
            ->set('checkbox', false)
            ->set('radio', false)
            ->call('submit')
            ->assertSeeHtml('The input field is required')
            ->assertSeeHtml('The textarea field is required')
            ->assertSeeHtml('The select field is required')
            ->assertSeeHtml('The multi select field is required')
            ->assertSeeHtml('The checkbox must be accepted')
            ->assertSeeHtml('The radio must be accepted');
    }
}
