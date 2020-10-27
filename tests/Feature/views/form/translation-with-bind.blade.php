@php
    $targetA = new \Datalogix\TailwindComponents\Tests\Feature\Form\TranslatableModel;
    $targetA->setTranslations('input', ['nl' => 'hallo', 'en' => 'hello']);
    $targetB = new \Datalogix\TailwindComponents\Tests\Feature\Form\TranslatableModel;
    $targetB->setTranslations('output', ['nl' => 'vaarwel', 'en' => 'goodbye']);
@endphp

<x-form>
    @bind($targetA)
        <x-input name="input" language="nl" />

        <x-input name="output" language="nl" :bind="$targetB" />

        <x-input name="input" language="en" />

        <x-input name="output" language="en" :bind="$targetB" />

        <x-submit />
    @endbind
</x-form>
