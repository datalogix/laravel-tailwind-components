@php
    $targetA = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => true,
        'radio' => true
    ];
    $targetB = [
        'input' => 'd',
        'textarea' => 'e',
        'select' => 'f',
        'checkbox' => false,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($targetA)
        <x-input :bind="$targetB" name="input" />

        <x-textarea :bind="$targetB" name="textarea" />

        <x-select :bind="$targetB" name="select" :options="['c' => 'c', 'f' => 'f']" />

        <x-checkbox :bind="$targetB" name="checkbox" />

        <x-group name="radio">
            <x-radio :bind="$targetB" name="radio" />
        </x-group>

        <x-submit />
    @endbind
</x-form>
